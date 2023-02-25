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

use App\Models\Tender\TenderInfo;
use App\Models\Log\ActivityLog;


class TenderInfoController extends Controller{


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
        
        $this->middleware('permission:see-tender', ['only' => ['index','tenderInfoViewPageLoad','generateSlug']]);
        $this->middleware('permission:create-tender', ['only' => ['index','tenderInfoAddPage','tenderInfoInsert']]);
        $this->middleware('permission:edit-tender', ['only' => ['index','tenderInfoEditPageLoad','tenderInfoUpdate']]);
        $this->middleware('permission:delete-tender', ['only' => ['tenderInfoDelete']]);
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

        // $tenderInfo = TenderInfo::all();
        $tenderInfo = TenderInfo::select('tender_infos.*', 'users.name')
            ->join('users', 'users.id', '=', 'tender_infos.CREATOR')->get();

        return view('admin.tender.info.show-list',compact('tenderInfo'));
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

    public function tenderInfoAddPage(){

        return view('admin.tender.info.add-tender-info');
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tender Info Detail Page View
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tenderInfoViewPageLoad($slug){

        $tenderInfoData = TenderInfo::select('tender_infos.*')
        ->where('SLUG', '=', $slug)
        ->orderBy('TENDER_INFO_ID', 'DESC')
        ->get();

        return view('admin.tender.info.view-tender-info',compact('tenderInfoData'));

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

    public function tenderInfoInsert(Request $request){

        $validated = $request->validate([
            'TENDER_ID' => 'required',
            'ORGANIZATION'=>'required',
            'AMOUNT' => 'required',
            'YEAR'=>'required',

        ],
        [
            'TENDER_ID.required' => 'Please Insert Tender ID',
        ]);

        // $SLUG = SlugService::createSlug(PurchaseOrder::class, 'SLUG', $request->PO_NO);
        $SLUG = $this->generateSlug($request->TENDER_ID);

        $tenderInfo = TenderInfo::create([
            'TENDER_ID' => $request->TENDER_ID,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ORGANIZATION' => $request->ORGANIZATION,
            'AMOUNT' => $request->AMOUNT,
            'YEAR' => $request->YEAR,
            'PURCHASE_DEADLINE' => $request->PURCHASE_DEADLINE,
            'TOTAL_PURCHASE_AMOUNT' => $request->TOTAL_PURCHASE_AMOUNT,
            'TOTAL_ITEMS' => $request->TOTAL_ITEMS,
            'PURCHASE_QUANTITY' => $request->PURCHASE_QUANTITY,
            'PURCHASE_DUE_ITEMS' => $request->PURCHASE_DUE_ITEMS,
            'DELIVERY_ITEMS' => $request->DELIVERY_ITEMS,
            'ITEMS_DELIVERY_DUE' => $request->ITEMS_DELIVERY_DUE,
            'SLUG' => $request->SLUG,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Added information of Tender ID: ".$request->TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);


        return redirect()->route('tender.info.lists')->with('crudMsg','Tender '.$request->TENDER_ID.' Info Added Successfully');
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

    public function tenderInfoEditPageLoad($slug){

        $tenderInfoData = TenderInfo::select('tender_infos.*')
        ->where('SLUG', '=', $slug)
        ->orderBy('TENDER_INFO_ID', 'DESC')
        ->get();

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('tender_infos')->where('SLUG',$slug)->first();

        return view('admin.tender.info.edit-tender-info',compact('tenderInfoData'));

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

    public function tenderInfoUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'TENDER_ID' => 'required',
            'ORGANIZATION'=>'required',
            'AMOUNT' => 'required',
            'YEAR'=>'required',

        ],
        [
            'TENDER_ID.required' => 'Please Insert Tender ID',
        ]);


        $update = TenderInfo::where('SLUG', $SLUG)->update([
            'TENDER_ID' => $request->TENDER_ID,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ORGANIZATION' => $request->ORGANIZATION,
            'AMOUNT' => $request->AMOUNT,
            'YEAR' => $request->YEAR,
            'PURCHASE_DEADLINE' => $request->PURCHASE_DEADLINE,
            'TOTAL_PURCHASE_AMOUNT' => $request->TOTAL_PURCHASE_AMOUNT,
            'TOTAL_ITEMS' => $request->TOTAL_ITEMS,
            'PURCHASE_QUANTITY' => $request->PURCHASE_QUANTITY,
            'PURCHASE_DUE_ITEMS' => $request->PURCHASE_DUE_ITEMS,
            'DELIVERY_ITEMS' => $request->DELIVERY_ITEMS,
            'ITEMS_DELIVERY_DUE' => $request->ITEMS_DELIVERY_DUE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        
        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated information of Tender ID: ".$request->TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('tender.info.lists')->with('crudMsg','Tender '.$SLUG.' Info Updated Successfully');
        // return response()->json(['success' => 'tender info Updated Successfully.']);

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

    public function tenderInfoDelete($slug){

        $tenderInfoData = TenderInfo::select('tender_infos.*')->where('SLUG', '=', $slug)->first();
        $TENDER_ID = $tenderInfoData->TENDER_ID;

        $tenderInfoDelete = TenderInfo::where('SLUG', $slug)->delete();
        // $tenderInfoDelete = DB::table('tender_infos')->where('SLUG', $slug)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted information of Tender ID: ".$TENDER_ID.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Tender Info '.$slug.' Permanently Deleted');
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

        if (TenderInfo::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(TenderInfo::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }

}
