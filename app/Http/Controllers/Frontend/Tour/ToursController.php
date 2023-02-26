<?php

namespace App\Http\Controllers\Frontend\Tour;

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

        $tourPackages = TourPackage::all();

        return view('frontend.tours.tours',compact('tourPackages'));
    }

    public function tourPackageDetail($id,$slug){

        $tourPackageData = TourPackage::select("*")->where('SLUG', $slug)->get();
        $tourPackageInfoData = TourPackageInfo::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageImageData = TourPackageImage::select('tour_packages.SLUG', 'tour_package_images.*')
        ->join('tour_packages', 'tour_packages.id', '=', 'tour_package_images.PACKAGE_ID')
        ->where('tour_package_images.PACKAGE_ID', '=', $id)
        ->get();
        $tourPackageIncludedServiceData = TourPackageIncludedService::select("*")->where('PACKAGE_ID', $id)->get();
        $tourPackageExcludedServiceData = TourPackageExcludedService::select("*")->where('PACKAGE_ID', $id)->get();

        return view('frontend.tours.tour-detail',compact('tourPackageData','tourPackageInfoData','tourPackageImageData','tourPackageIncludedServiceData','tourPackageExcludedServiceData'));
    }
}
