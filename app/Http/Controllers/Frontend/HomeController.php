<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Helper\Helper;

use App\Models\AboutUs;
use App\Models\AddonService;
use App\Models\AddonServiceList;
use App\Models\CustomerLogo;
use App\Models\HeroSection;
use App\Models\OurService;
use App\Models\OurServiceList;
use App\Models\Statistics;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Home Page Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $heroSection = HeroSection::select("*")->where('HERO_SECTION_ID', '1')->get();
        $aboutUs = AboutUs::all();
        $customerLogos = CustomerLogo::all();
        $ourService = OurService::select("*")->where('OUR_SERVICE_ID', '1')->get();
        $ourServiceList = OurServiceList::all();
        $statistics = Statistics::select("*")->where('STATISTICS_ID', '1')->get();
        $addonService = AddonService::select("*")->where('ADDON_SERVICE_ID', '1')->get();
        $addonServiceList = AddonServiceList::all();

        return view('frontend.home.home',compact('heroSection','aboutUs','customerLogos','ourService','ourServiceList','statistics','addonService','addonServiceList'));
    }
}
