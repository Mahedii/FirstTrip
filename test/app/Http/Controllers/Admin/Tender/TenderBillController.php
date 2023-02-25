<?php

namespace App\Http\Controllers\Admin\Tender;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use File;
use Image;
use Illuminate\Support\Arr;

use App\Models\Tender\TenderBill;
use App\Models\Log\ActivityLog;

class TenderBillController extends Controller{


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Role Permissions
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    function __construct(){
        
        $this->middleware('permission:see-tender', ['only' => ['index','tenderBillViewPageLoad','generateSlug']]);
        $this->middleware('permission:create-tender', ['only' => ['index','tenderBillAddPage','tenderBillInsert']]);
        $this->middleware('permission:edit-tender', ['only' => ['index','tenderBillEditPageLoad','tenderBillUpdate']]);
        $this->middleware('permission:delete-tender', ['only' => ['tenderBillDelete']]);
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tender Info Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        // $tenderBill = TenderBill::all();
        $tenderBill = TenderBill::select('tender_bills.*', 'users.name')
            ->join('users', 'users.id', '=', 'tender_bills.CREATOR')->get();

        return view('admin.tender.bill.show-list',compact('tenderBill'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tender Info Add Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillAddPage(){

        return view('admin.tender.bill.add-tender-bill');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tender Bill Detail Page View
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillViewPageLoad($slug){

        $tenderBillData = TenderBill::select('tender_bills.*')
        ->where('SLUG', '=', $slug)
        ->orderBy('TENDER_BILL_ID', 'DESC')
        ->get();

        return view('admin.tender.bill.view-tender-bill',compact('tenderBillData'));

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tender Info Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillInsert(Request $request){

        $validated = $request->validate([
            'TENDER_ID' => 'required',
            'SL'=>'required',
            'COMPANY_NAME'=>'required',
            'AMOUNT' => 'required',
            'DATE'=>'required',

        ],
        [
            'TENDER_ID.required' => 'Please Insert Tender ID',
        ]);

        // $SLUG = SlugService::createSlug(PurchaseOrder::class, 'SLUG', $request->PO_NO);
        $SLUG = $this->generateSlug($request->TENDER_ID);

        $tenderBill = TenderBill::create([
            'SL' => $request->SL,
            'TENDER_ID' => $request->TENDER_ID,
            'COMPANY_NAME' => $request->COMPANY_NAME,
            'DATE' => $request->DATE,
            'CHEQUE_NO' => $request->CHEQUE_NO,
            'AMOUNT' => $request->AMOUNT,
            'SLUG' => $request->SLUG,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Added bill information of Tender ID: ".$request->TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('tender.bill.lists')->with('crudMsg','Tender '.$request->TENDER_ID.' Bill Added Successfully');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Tender Info Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillEditPageLoad($slug){

        $tenderBillData = TenderBill::select('tender_bills.*')
        ->where('SLUG', '=', $slug)
        ->orderBy('TENDER_BILL_ID', 'DESC')
        ->get();

        //  //  Query Builder Find Method
        // $tenderBillData = DB::table('tender_bills')->where('SLUG',$slug)->first();

        return view('admin.tender.bill.edit-tender-bill',compact('tenderBillData'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Tender Info Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'TENDER_ID' => 'required',
            'SL'=>'required',
            'COMPANY_NAME'=>'required',
            'AMOUNT' => 'required',
            'DATE'=>'required',

        ],
        [
            'TENDER_ID.required' => 'Please Insert Tender ID',
        ]);


        $update = TenderBill::where('SLUG', $SLUG)->update([
            'SL' => $request->SL,
            'TENDER_ID' => $request->TENDER_ID,
            'COMPANY_NAME' => $request->COMPANY_NAME,
            'DATE' => $request->DATE,
            'CHEQUE_NO' => $request->CHEQUE_NO,
            'AMOUNT' => $request->AMOUNT,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated bill information of Tender ID: ".$request->TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('tender.bill.lists')->with('crudMsg','Tender Bill '.$SLUG.' Updated Successfully');
        // return response()->json(['success' => 'tender bill Updated Successfully.']);

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Tender Info
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderBillDelete($slug){

        $tenderBillData = TenderBill::select('tender_bills.*')->where('SLUG', '=', $slug)->first();
        $TENDER_ID = $tenderBillData->TENDER_ID;

        $tenderInfoDelete = TenderBill::where('SLUG', $slug)->delete();
        // $tenderInfoDelete = DB::table('tender_bills')->where('SLUG', $slug)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted bill information of Tender ID: ".$TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Tender Bill '.$slug.' Permanently Deleted');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Generate Slug
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public static function generateSlug($name){

        $slug=Str::slug($name);
        // dd($slug,"show");

        if (TenderBill::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(TenderBill::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }

}
