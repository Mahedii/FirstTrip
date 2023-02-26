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
use App\Models\Country\PackageCountry;
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

        $packageCountries = PackageCountry::all();

        return view('admin.tours.add.index',compact('tourPackages','packageCountries'));
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
            'COUNTRY_ID'=>'required',
            'DESTINATION'=>'required',
            'COST' => 'required',
            'OVERVIEW' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'PACKAGE_NAME.required' => 'Please give a package name',
            'DURATION.required' => 'Please give a duration for the package',
            'TOUR_TYPE.required' => 'flight type is required',
            'COUNTRY_ID.required' => 'Please select a country',
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

        // dd($request->COUNTRY_ID);

        TourPackage::create([
            'PACKAGE_NAME' => $request->PACKAGE_NAME,
            'DURATION' => $request->DURATION,
            'TOUR_TYPE' => $request->TOUR_TYPE,

            'DESTINATION' => $request->DESTINATION,
            'COUNTRY_ID' => $request->COUNTRY_ID,
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



        return redirect()->route('tour.package.lists')->with('crudMsg','Package '.$request->PACKAGE_NAME.' Added Successfully');
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

    public function loadTourPackageEditPage($id,$slug){

        $tourPackageData = TourPackage::select('tour_packages.*', 'package_countries.COUNTRY_NAME')
        ->join('package_countries', 'package_countries.id', '=', 'tour_packages.COUNTRY_ID')
        ->where('tour_packages.SLUG', '=', $slug)
        ->get();
        $tourPackageInfoData = TourPackageInfo::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageImageData = TourPackageImage::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageIncludedServiceData = TourPackageIncludedService::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageExcludedServiceData = TourPackageExcludedService::select("*")->where('PACKAGE_ID', $id)->get();

        $tourPackages = TourPackage::select('tour_packages.id', 'tour_packages.PACKAGE_NAME')
            ->orderBy('tour_packages.id', 'DESC')
        	->get();

        $packageCountries = PackageCountry::all();

        return view('admin.tours.edit.index',compact('tourPackageData','tourPackageInfoData','tourPackageImageData','tourPackageIncludedServiceData','tourPackageExcludedServiceData','tourPackages','packageCountries'));

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
            'PACKAGE_NAME' => 'required',
            'DURATION'=>'required',
            'TOUR_TYPE' => 'required',
            'COUNTRY_ID'=>'required',
            'DESTINATION'=>'required',
            'COST' => 'required',
            'OVERVIEW' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'PACKAGE_NAME.required' => 'Please give a package name',
            'DURATION.required' => 'Please give a duration for the package',
            'TOUR_TYPE.required' => 'flight type is required',
            'COUNTRY_ID.required' => 'Please select a country',
            'DESTINATION.required' => 'Please give a destination name',
            'COST.required' => 'Tour package cost is required',
            'OVERVIEW.required' => 'Please give a overview of the package',
        ]);


        $tourPackage = TourPackage::where('SLUG', $SLUG)->first();

        $PACKAGE_ID = $tourPackage->id;
        $thumnailFilePath = $tourPackage->FILE_PATH;
        $thumnailFileName = $tourPackage->FILE_NAME;

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileExtension = strtolower($fileInput->getClientOriginalExtension());
            $thumnailFileName = 'thumbnail.'.$fileExtension;

            $path = public_path('frontend/assets/images/tour_packages/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $thumnailFileName);
            $thumnailFilePath = 'frontend/assets/images/tour_packages/'.$SLUG.'/'.$thumnailFileName;

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
                        'PACKAGE_ID' => $PACKAGE_ID,
                        'FILE_NAME' => $fileName,
                        'FILE_PATH' => $filePath,
                        'CREATOR' => Auth::user()->id
                    ]);
                }
            }
        }

        TourPackage::where('SLUG', $SLUG)->update([
            'PACKAGE_NAME' => $request->PACKAGE_NAME,
            'DURATION' => $request->DURATION,
            'TOUR_TYPE' => $request->TOUR_TYPE,
            'COUNTRY_ID' => $request->COUNTRY_ID,
            'DESTINATION' => $request->DESTINATION,
            'COST' => $request->COST,
            'OVERVIEW' => $request->OVERVIEW,
            'FILE_NAME' => $thumnailFileName,
            'FILE_PATH' => $thumnailFilePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated TOur Package ".$request->PACKAGE_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('tour.package.lists')->with('crudMsg','Tour Package '.$request->PACKAGE_NAME.' Updated Successfully');

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

        TourPackage::where('SLUG', $slug)->delete();

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

            // return redirect()->back()->with('crudMsg','Package '.$tourPackage->PACKAGE_NAME.' details is successfully added');
            return response()->json(['success'=>'Package '.$tourPackage->PACKAGE_NAME.' details is successfully added']);

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
    | Delete Tour Package Image
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageImageDelete($id){

        $imageData = TourPackageImage::where('id', $id)->first();
        $FILE_PATH = $imageData->FILE_PATH;

        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        TourPackageImage::where('id', $id)->delete();

        return response()->json("Success");
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Tour Package included service data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function incServiceUpdate(Request $request){

        TourPackageIncludedService::where('id', $request->id)->update([
            'INCLUDED_SERVICE' => $request->INCLUDED_SERVICE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('crudMsg','Included service '.$request->INCLUDED_SERVICE.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Tour Package excluded service data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function excServiceUpdate(Request $request){

        TourPackageExcludedService::where('id', $request->id)->update([
            'EXCLUDED_SERVICE' => $request->EXCLUDED_SERVICE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('crudMsg','Excluded service '.$request->EXCLUDED_SERVICE.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Tour Package planning data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackagePlanUpdate(Request $request){

        TourPackageInfo::where('id', $request->id)->update([
            'TOUR_PLAN_TITLE_TEXT' => $request->TOUR_PLAN_TITLE_TEXT,
            'TOUR_PLAN_TITLE_BODY' => $request->TOUR_PLAN_TITLE_BODY,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('crudMsg','Tour Plan '.$request->TOUR_PLAN_TITLE_TEXT.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Tour Package included service data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function includedServiceDelete($id){

        TourPackageIncludedService::where('id', $id)->delete();

        return response()->json("Success");
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Tour Package excluded service data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function excludedServiceDelete($id){

        TourPackageExcludedService::where('id', $id)->delete();

        return response()->json("Success");
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Tour Package plan data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPlanDelete($id){

        TourPackageInfo::where('id', $id)->delete();

        return response()->json("Success");
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
