<?php

namespace App\Http\Controllers\Frontend\Tour;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tour\TourPackage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Tour\TourPackageInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour\TourPackageImage;
use App\Models\Tour\TourPackageExcludedService;
use App\Models\Tour\TourPackageIncludedService;

class ToursController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tours Package List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $tourPackages = TourPackage::select("*")->where('STATUS', '1')->get();

        return view('frontend.tours.tours',compact('tourPackages'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tours Package detail Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function tourPackageDetail($id,$slug){

        $tourPackageData = TourPackage::select("*")
            ->where('SLUG', $slug)
            ->where('STATUS', '1')->get();

        $getTourPackageData = TourPackage::select("*")->where('SLUG', $slug)->where('STATUS', '1')->first();
        $COUNTRY_ID = $getTourPackageData->COUNTRY_ID;

        $tourPackageInfoData = TourPackageInfo::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageImageData = TourPackageImage::select('tour_packages.SLUG', 'tour_package_images.*')
        ->join('tour_packages', 'tour_packages.id', '=', 'tour_package_images.PACKAGE_ID')
        ->where('tour_package_images.PACKAGE_ID', '=', $id)
        ->get();
        $tourPackageIncludedServiceData = TourPackageIncludedService::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageExcludedServiceData = TourPackageExcludedService::select("*")->where('PACKAGE_ID', $id)->get();

        $similarPackageData = TourPackage::select("PACKAGE_NAME","DESTINATION","COST","FILE_PATH","id","SLUG")
        ->where('COUNTRY_ID', $COUNTRY_ID)->limit(6)->get();

        return view('frontend.tours.tour-detail',compact('tourPackageData','tourPackageInfoData','tourPackageImageData','tourPackageIncludedServiceData','tourPackageExcludedServiceData','similarPackageData'));
    }
}
