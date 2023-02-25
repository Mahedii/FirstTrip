<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Helper\Helper;

use App\Models\AboutUs;
use App\Models\AboutPage\AboutPageData;
use App\Models\AboutPage\AboutPageDataList;
use App\Models\CustomerLogo;
use App\Models\OurService;
use App\Models\OurServiceList;

class AboutController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load About Us Page Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $aboutUs = AboutUs::all();
        $aboutPageData = AboutPageData::select("*")->where('SLUG', 'about-page')->get();
        $aboutPageDataListTitle = AboutPageDataList::all();
        $aboutPageDataListDescription = AboutPageDataList::all();
        $customerLogos = CustomerLogo::all();
        $ourService = OurService::select("*")->where('OUR_SERVICE_ID', '1')->get();
        $ourServiceList = OurServiceList::all();
        

        return view('frontend.about-us.about-us',compact('aboutUs','aboutPageData','aboutPageDataListTitle','aboutPageDataListDescription','customerLogos','ourService','ourServiceList'));
    }
}
