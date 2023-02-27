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

        return view('admin.static-page.home.hero-section',compact('heroSectionData'));
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
