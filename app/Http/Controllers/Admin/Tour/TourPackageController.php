<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use Image;
use Validator;
use Response;
use Illuminate\Support\Arr;

use App\Models\Tour\TourPackage;
use App\Models\Tour\TourPackageInfo;
use App\Models\Tour\TourPackageImage;
use App\Models\Tour\TourPackageIncludedService;
use App\Models\Tour\TourPackageExcludedService;
use App\Models\Log\ActivityLog;

class TourPackageController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Role Permissions
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    // function __construct(){

    //     $this->middleware('permission:see-po', ['only' => ['index','poListDetailPageLoad','generateSlug']]);
    //     $this->middleware('permission:create-po', ['only' => ['index','poAddPage','poInsert','poVatAit','poListInsert']]);
    //     $this->middleware('permission:edit-po', ['only' => ['index','poEditPageLoad','poUpdate','poListEditPageLoad','poListUpdate']]);
    //     $this->middleware('permission:delete-po', ['only' => ['poListDelete']]);
    //     $this->middleware('permission:print-po', ['only' => ['poPrintView','poAddBill','poListDetail','numberToWord']]);
    // }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tour Package List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $tourPackages = TourPackage::all();

        return view('admin.tours.view.index',compact('tourPackages'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tour Package Detail Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageDetailPageLoad($slug){

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tour Package Add Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadTourPackageAddPage(){

        $tourPackages = TourPackage::select('tour_packages.id', 'tour_packages.PACKAGE_NAME')
            ->orderBy('tour_packages.id', 'DESC')
        	->get();

        return view('admin.tours.add.index',compact('tourPackages'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tour Package Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageInsert(Request $request){

        $validated = $request->validate([
            'PACKAGE_NAME' => 'required',
            'DURATION'=>'required',
            'TOUR_TYPE' => 'required',
            'DESTINATION'=>'required',
            'COST' => 'required',
            'OVERVIEW' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'PACKAGE_NAME.required' => 'Please give a package name',
            'DURATION.required' => 'Please give a duration for the package',
            'TOUR_TYPE.required' => 'flight type is required',
            'DESTINATION.required' => 'Please give a destination name',
            'COST.required' => 'Tour package cost is required',
            'OVERVIEW.required' => 'Please give a overview of the package',
        ]);

        $SLUG = $this->generateSlug($request->PACKAGE_NAME);

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            //$fileExtension = $fileInput->extension();
            $fileExtension = strtolower($fileInput->getClientOriginalExtension());

            // $fileName = $fileInput->getClientOriginalName();
            $fileName = 'thumbnail.'.$fileExtension;

            $path = public_path('frontend/assets/images/tour_packages/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Image::make($inputFile)->resize(300,200)->save(public_path('frontend/assets/images/tour_packages/'.$SLUG.'/'.$fileName));
            $request->singleFile->move($path, $fileName);

            $filePath = 'frontend/assets/images/tour_packages/'.$SLUG.'/'.$fileName;

        }
        else{
            $fileName = "";
            $filePath = "";
        }

        $po = TourPackage::create([
            'PACKAGE_NAME' => $request->PACKAGE_NAME,
            'DURATION' => $request->DURATION,
            'TOUR_TYPE' => $request->TOUR_TYPE,
            'DESTINATION' => $request->DESTINATION,
            'COST' => $request->COST,
            'OVERVIEW' => $request->OVERVIEW,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Created Package ".$request->PACKAGE_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->back()->with('crudMsg','Package '.$request->PACKAGE_NAME.' Added Successfully');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Tour Package Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadTourPackageEditPage($slug){

        $purchaseOrderData = PurchaseOrder::select('purchase_orders.*', 'customers.CUSTOMER_NAME')
        ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
        ->where('purchase_orders.SLUG', '=', $slug)
        ->orderBy('purchase_orders.PURCHASE_ORDER_ID', 'DESC')
        ->get();
        $customers = Customer::orderBy('CUSTOMER_ID', 'DESC')->get();

        $purchaseOrderAllData = PurchaseOrder::all();
        $po = PurchaseOrder::select("*")->where('SLUG', $slug)->first();
        $PO_NO = $po->PO_NO;

        $purchaseOrderList = PurchaseOrderList::select('purchase_order_lists.*')
        ->where('PO_NO', '=', $PO_NO)
        ->orderBy('PURCHASE_ORDER_LIST_ID', 'ASC')
        ->get();

        // dd($pol);

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('purchase_orders')->where('SLUG',$slug)->first();

        return view('admin.po.edit-po',compact('purchaseOrderData','customers','purchaseOrderAllData','purchaseOrderList'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Tour Package Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'CUSTOMER_ID' => 'required',
            'PO_DATE' => 'required',
            'REF_NO'=>'required',
            'INVOICE_ADDRESS' => 'required',
            'DELIVERY_ADDRESS' => 'required',
            'VAT'=>'required',
            'AIT'=>'required',
            'NOTE'=>'required',
            'inputFile' => 'mimes:csv,zip,xlx,xls,pdf|max:5120',
        ],
        [
            'CUSTOMER_ID.required' => 'Please Select Customer Name',
        ]);


        $po = PurchaseOrder::where('SLUG', $SLUG)->first();
        $PO_NO = $po->PO_NO;
        $FILE_PATH = $po->FILE_PATH;
        $filePath = $po->FILE_PATH;
        $fileName = $po->FILE_NAME;

        $fileInput = $request->file('inputFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            //$fileExtension = $fileInput->extension();
            //$fileExtension = strtolower($fileInput->getClientOriginalExtension());

            $path = public_path('frontend/assets/files/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }


            $request->inputFile->move($path, $fileName);

            $filePath = 'frontend/assets/files/'.$SLUG.'/'.$fileName;


            if( File::exists(public_path($FILE_PATH)) ) {
                File::delete(public_path($FILE_PATH));
            }



        }


        $update = PurchaseOrder::where('SLUG', $SLUG)->update([
            'CUSTOMER_ID' => $request->CUSTOMER_ID,
            'PO_DATE' => $request->PO_DATE,
            'REF_NO' => $request->REF_NO,
            'INVOICE_ADDRESS' => $request->INVOICE_ADDRESS,
            'DELIVERY_ADDRESS' => $request->DELIVERY_ADDRESS,
            'VAT' => $request->VAT,
            'AIT' => $request->AIT,
            'NOTE' => $request->NOTE,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated PO ".$PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('po.lists')->with('crudMsg','PO '.$request->SLUG.' Updated Successfully');
        // return response()->json(['success' => 'PO Updated Successfully.']);

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Tour Package
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageDelete($slug){

        $tourPackage = TourPackage::select("*")->where('SLUG', $slug)->first();
        $PACKAGE_NAME = $tourPackage->PACKAGE_NAME;
        $FILE_PATH = $tourPackage->FILE_PATH;


        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        File::deleteDirectory(public_path('frontend/assets/images/tour_packages/'.$slug));

        $poDelete = TourPackage::where('SLUG', $slug)->delete();
        // $poDelete = DB::table('purchase_orders')->where('SLUG', $slug)->delete();


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted Tour Package ".$PACKAGE_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Tour Package '.$PACKAGE_NAME.' Permanently Deleted');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Insert Tour Package Details
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */
    public function packageDetailsInsert(Request $request){

        $validated = Validator::make($request->all(), [
            'PACKAGE_ID'=>'required',
            'INCLUDED_SERVICE'=>'required|array',
            'INCLUDED_SERVICE.*'=>'required|string',
            'EXCLUDED_SERVICE'=>'required|array',
            'EXCLUDED_SERVICE.*'=>'required|string',
            'TOUR_PLAN_TITLE_TEXT'=>'required|array',
            'TOUR_PLAN_TITLE_TEXT.*'=>'required|string',
            'TOUR_PLAN_TITLE_BODY'=>'required|array',
            'TOUR_PLAN_TITLE_BODY.*'=>'required|string',
            // 'multipleImageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
        [
            'PACKAGE_ID.required' => 'Please Select a Package',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);

        if ($validated->passes()) {

            $tourPackage = TourPackage::select('SLUG','PACKAGE_NAME')->where('id', $request->PACKAGE_ID)->first();
            $SLUG = $tourPackage->SLUG;

            if(count($request->INCLUDED_SERVICE) > 0){
                for($i=0; $i<count($request->INCLUDED_SERVICE); $i++){
                    $tourPackageIncludedService = TourPackageIncludedService::create([
                        'PACKAGE_ID' => $request->PACKAGE_ID,
                        'INCLUDED_SERVICE' => $request->INCLUDED_SERVICE[$i],
                        'CREATOR' => Auth::user()->id
                    ]);
                }
            }

            if(count($request->EXCLUDED_SERVICE) > 0){
                for($i=0; $i<count($request->EXCLUDED_SERVICE); $i++){
                    TourPackageExcludedService::create([
                        'PACKAGE_ID' => $request->PACKAGE_ID,
                        'EXCLUDED_SERVICE' => $request->EXCLUDED_SERVICE[$i],
                        'CREATOR' => Auth::user()->id
                    ]);
                }
            }

            if(count($request->TOUR_PLAN_TITLE_TEXT) > 0){
                for($i=0; $i<count($request->TOUR_PLAN_TITLE_TEXT); $i++){
                    TourPackageInfo::create([
                        'PACKAGE_ID' => $request->PACKAGE_ID,
                        'TOUR_PLAN_TITLE_TEXT' => $request->TOUR_PLAN_TITLE_TEXT[$i],
                        'TOUR_PLAN_TITLE_BODY' => $request->TOUR_PLAN_TITLE_BODY[$i],
                        'CREATOR' => Auth::user()->id
                    ]);
                }
            }

            $multiImageInput = $request->file('multipleImageFile');

            if ($request->hasfile('multipleImageFile')) {
                foreach ($request->multipleImageFile as $multi_image) {
                    $fileName = $multi_image->getClientOriginalName();
                    $path = public_path('frontend/assets/images/tour_packages/'.$SLUG.'/');
                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    if ($multi_image->move($path, $fileName)) {
                        $filePath = 'frontend/assets/images/tour_packages/'.$SLUG.'/'.$fileName;
                        TourPackageImage::create([
                            'PACKAGE_ID' => $request->PACKAGE_ID,
                            'FILE_NAME' => $fileName,
                            'FILE_PATH' => $filePath,
                            'CREATOR' => Auth::user()->id
                        ]);
                    }
                }
             }

            // if ($multiImageInput){

            //     foreach($multiImageInput as $multi_image){

            //         $fileName = $multi_image->getClientOriginalName();

            //         $path = public_path('frontend/assets/images/tour_packages/'.$SLUG.'/');
            //         if (!File::isDirectory($path)) {
            //             File::makeDirectory($path, 0777, true, true);
            //         }

            //         // $request->multi_image->move($path, $fileName);
            //         Image::make($multi_image)->resize(300,200)->save(public_path('frontend/assets/images/tour_packages/'.$SLUG.'/'.$fileName));
            //         $filePath = 'frontend/assets/images/tour_packages/'.$SLUG.'/'.$fileName;

            //         TourPackageImage::create([
            //             'PACKAGE_ID' => $request->PACKAGE_ID,
            //             'FILE_NAME' => $fileName,
            //             'FILE_PATH' => $filePath,
            //             'CREATOR' => Auth::user()->id
            //         ]);

            //     }

            // }

            $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
            $random_color = Arr::random($color_array);
            $ACTION = "Inserted Package ".$tourPackage->PACKAGE_NAME." informations in successfully.";

            $log = ActivityLog::create([
                'USER_ID' => Auth::user()->id,
                'USER_NAME' => Auth::user()->name,
                'ACTION' => $ACTION,
                'CARD_COLOR' => $random_color
            ]);

            return redirect()->back()->with('crudMsg','Package '.$tourPackage->PACKAGE_NAME.' details is successfully added');
            // return response()->json(['success'=>'Package '.$tourPackage->PACKAGE_NAME.' details is successfully added']);

        }
        else{
            // return response()->json(['error'=>$validated->errors()]);
            return response()->json(['errors'=>$validated->errors()->all()]);
        }

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

        if (TourPackage::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(TourPackage::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }
}
