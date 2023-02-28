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

        return view('admin.static-page.home.add');
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

            $fileName = $multi_image->getClientOriginalName();

            $path = public_path('frontend/assets/images/hero_section/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $request->singleFile->move($path, $FileName);
            $FilePath = 'frontend/assets/images/hero_section/'.$SLUG.'/'.$FileName;

        } 

        HeroSection::create([
            'TITLE' => $request->TITLE,
            'SUBTITLE' => $request->SUBTITLE,
            'SLUG' => $SLUG,
            'FILE_NAME' => $FileName,
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
