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

use App\Models\HeroSection\HeroSection;

class HomePageController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load hero section update Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $heroSectionData = HeroSection::all();

        return view('admin.static-page.home.add',compact('heroSectionData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Hero section data Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function heroSectionInsert(Request $request){

        // dd($request);

        $validated = Validator::make($request->all(), [
            'TITLE'=>'required',
            'SUBTITLE'=>'required',
            'singleImageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
        [
            'TITLE.required' => 'Please give a title',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);


        $SLUG = $this->generateSlug($request->TITLE);

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            $path = public_path('frontend/assets/images/hero_section/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $fileName);
            $FilePath = 'frontend/assets/images/hero_section/'.$SLUG.'/'.$fileName;

        }

        HeroSection::create([
            'TITLE' => $request->TITLE,
            'SUBTITLE' => $request->SUBTITLE,
            'SLUG' => $SLUG,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $FilePath,
            'EDITOR' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // dd($request->COUNTRY_ID);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Created hero section image and text.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','Created hero section image and text.');
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

    public function loadHeroSectionEditPage($id,$slug){

        $heroSectionData = HeroSection::select("*")->where('id', $id)->get();


        return view('admin.static-page.home.edit',compact('heroSectionData'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Hero Section Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function heroSectionUpdate(Request $request){

        $validated = Validator::make($request->all(), [
            'TITLE'=>'required',
            'SUBTITLE'=>'required',
            'singleImageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ],
        [
            'TITLE.required' => 'Please give a title',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);


        $heroSection = HeroSection::where('SLUG', $request->SLUG)->first();

        $filePath = $heroSection->FILE_PATH;
        $fileName = $heroSection->FILE_NAME;

        $fileInput = $request->file('singleFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            $path = public_path('frontend/assets/images/hero_section/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $fileName);
            $filePath = 'frontend/assets/images/hero_section/'.$SLUG.'/'.$fileName;

        }


        HeroSection::where('SLUG', $request->SLUG)->update([
            'TITLE' => $request->TITLE,
            'SUBTITLE' => $request->SUBTITLE,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated Hero Section ".$request->TITLE.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('heroSection.show')->with('crudMsg','Hero Section '.$request->TITLE.' Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Selected Hero Section Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function heroSectionDelete($slug){

        $heroSection = HeroSection::select("*")->where('SLUG', $slug)->first();
        $TITLE = $heroSection->TITLE;
        $FILE_PATH = $heroSection->FILE_PATH;


        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        File::deleteDirectory(public_path('frontend/assets/images/hero_section/'.$slug));

        HeroSection::where('SLUG', $slug)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted hero section ".$TITLE.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Hero section '.$TITLE.' data Permanently Deleted');
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

        if (HeroSection::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(HeroSection::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }
}
