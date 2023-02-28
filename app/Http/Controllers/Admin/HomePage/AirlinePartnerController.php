<?php

namespace App\Http\Controllers\Admin\HomePage;

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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Partners\AirlinePartner;

class AirlinePartnerController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Airline Partner update Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $keyPartnerData = AirlinePartner::all();

        return view('admin.static-page.home.key-partners.add',compact('keyPartnerData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Airline Partner data Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function airlinePartnersInsert(Request $request){

        // dd($request);

        $validated = Validator::make($request->all(), [
            'NAME'=>'required',
            'singleImageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
        [
            'NAME.required' => 'Please give a name',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);


        $SLUG = $this->generateSlug($request->NAME);

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            $path = public_path('frontend/assets/images/partner/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $fileName);
            $FilePath = 'frontend/assets/images/partner/'.$SLUG.'/'.$fileName;

        }

        AirlinePartner::create([
            'NAME' => $request->NAME,
            'SLUG' => $SLUG,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $FilePath,
            'EDITOR' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Added a key partner";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','Added a key partner');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Airline Partner Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadAirlinePartnersEditPage($id,$slug){

        $keyPartnerData = AirlinePartner::select("*")->where('id', $id)->get();


        return view('admin.static-page.home.key-partners.edit',compact('keyPartnerData'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Airline Partner Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function airlinePartnersUpdate(Request $request){

        $validated = Validator::make($request->all(), [
            'NAME'=>'required',
            'singleImageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
        [
            'NAME.required' => 'Please give a name',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);


        $airlinePartner = AirlinePartner::where('SLUG', $request->SLUG)->first();

        $filePath = $airlinePartner->FILE_PATH;
        $fileName = $airlinePartner->FILE_NAME;

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            $path = public_path('frontend/assets/images/partner/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $fileName);
            $filePath = 'frontend/assets/images/partner/'.$SLUG.'/'.$fileName;

        }


        AirlinePartner::where('SLUG', $request->SLUG)->update([
            'NAME' => $request->NAME,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated key partner ".$request->NAME." data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('airlinePartners.show')->with('crudMsg','Key partner '.$request->NAME.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Selected Airline Partner Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function airlinePartnersDelete($slug){

        $airlinePartner = AirlinePartner::select("*")->where('SLUG', $slug)->first();
        $NAME = $airlinePartner->NAME;
        $FILE_PATH = $airlinePartner->FILE_PATH;


        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        File::deleteDirectory(public_path('frontend/assets/images/partner/'.$slug));

        AirlinePartner::where('SLUG', $slug)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted key partner ".$NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Key partner '.$NAME.' data Permanently Deleted');
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

        if (AirlinePartner::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(AirlinePartner::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }
}
