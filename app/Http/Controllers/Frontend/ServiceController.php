<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Helper\Helper;

use App\Models\ServicePage\ServicePageData;
use App\Models\ServicePage\ServicePageDataList;

use App\Models\OurService;
use App\Models\OurServiceList;

use App\Models\AddonService;
use App\Models\AddonServiceList;


class ServiceController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Service Page Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $servicePageData = ServicePageData::all();
        $servicePageDataList = ServicePageDataList::all();
        
        $ourService = OurService::select("*")->where('OUR_SERVICE_ID', '1')->get();
        $ourServiceList = OurServiceList::all();
        
        $addonService = AddonService::select("*")->where('ADDON_SERVICE_ID', '1')->get();
        $addonServiceList = AddonServiceList::all();

        return view('frontend.service.service',compact('servicePageData','servicePageDataList','ourService','ourServiceList','addonService','addonServiceList'));
    }
}
