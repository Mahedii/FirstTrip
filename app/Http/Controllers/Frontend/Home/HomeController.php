<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;

use App\Models\Tour\TourPackage;
use App\Models\Tour\TourPackageInfo;
use App\Models\Tour\TourPackageImage;
use App\Models\Tour\TourPackageIncludedService;
use App\Models\Tour\TourPackageExcludedService;
use App\Models\HeroSection\HeroSection;
use App\Models\Partners\AirlinePartner;
use App\Models\AboutSection\AboutSectionOne;

class HomeController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load home Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $tourPackages = TourPackage::all();
        $heroSectionData = HeroSection::all();
        $keyPartnerData = AirlinePartner::all();
        $aboutSectionOneData = AboutSectionOne::select("*")->where('id', '1')->get();

        return view('frontend.index',compact('tourPackages','heroSectionData','keyPartnerData','aboutSectionOneData'));
    }
}
