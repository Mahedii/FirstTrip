<?php

namespace App\Http\Controllers\Admin\DestinationCountry;

use File;
use Image;
use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Log\ActivityLog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Country\PackageCountry;

class DestinationCountryController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Destination Country List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $packageCountries = PackageCountry::all();

        return view('admin.destination-country.view.index',compact('packageCountries'));
    }

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Destination Country Add Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadDestinationCountryAddPage(){

        return view('admin.destination-country.add.index');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Destination Country Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function destinationCountryInsert(Request $request){

        $validated = $request->validate([
            'COUNTRY_NAME' => 'required|unique:package_countries',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'COUNTRY_NAME.required' => 'Please give a country name',
        ]);



        $SLUG = $this->generateSlug($request->COUNTRY_NAME);

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileExtension = strtolower($fileInput->getClientOriginalExtension());

            // $fileName = $fileInput->getClientOriginalName();
            $fileName = $request->COUNTRY_NAME.'.'.$fileExtension;

            $path = public_path('frontend/assets/images/destination/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $fileName);

            $filePath = 'frontend/assets/images/destination/'.$SLUG.'/'.$fileName;

        }
        else{
            $fileName = "";
            $filePath = "";
        }


        PackageCountry::create([
            'COUNTRY_NAME' => $request->COUNTRY_NAME,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Created country ".$request->COUNTRY_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->route('destination.country.lists')->with('crudMsg','Country '.$request->COUNTRY_NAME.' Added Successfully');
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

    public function loadDestinationCountryEditPage($slug){

        $packageCountryData = PackageCountry::select("*")->where('SLUG', $slug)->get();

        return view('admin.destination-country.edit.index',compact('packageCountryData'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Destination Country Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function destinationCountryUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'COUNTRY_NAME' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'COUNTRY_NAME.required' => 'Please give a country name',
        ]);

        $packageCountry = PackageCountry::where('SLUG', $SLUG)->first();

        $FilePath = $packageCountry->FILE_PATH;
        $FileName = $packageCountry->FILE_NAME;

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileExtension = strtolower($fileInput->getClientOriginalExtension());
            $FileName = 'thumbnail.'.$fileExtension;

            $path = public_path('frontend/assets/images/destination/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $FileName);
            $FilePath = 'frontend/assets/images/destination/'.$SLUG.'/'.$FileName;

        }


        PackageCountry::where('SLUG', $SLUG)->update([
            'COUNTRY_NAME' => $request->COUNTRY_NAME,
            'FILE_NAME' => $FileName,
            'FILE_PATH' => $FilePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated Country name to ".$request->COUNTRY_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('destination.country.lists')->with('crudMsg','Tour Package '.$request->COUNTRY_NAME.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Destination Country Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function destinationCountryDelete($slug){

        $packageCountry = PackageCountry::select("*")->where('SLUG', $slug)->first();
        $COUNTRY_NAME = $packageCountry->COUNTRY_NAME;
        $FILE_PATH = $packageCountry->FILE_PATH;


        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        File::deleteDirectory(public_path('frontend/assets/images/destination/'.$slug));

        PackageCountry::where('SLUG', $slug)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted destination country ".$COUNTRY_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Destination Country '.$COUNTRY_NAME.' Permanently Deleted');
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

        if (PackageCountry::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(PackageCountry::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }
}
