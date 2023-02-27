<?php

namespace App\Http\Controllers\Frontend\Destination;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tour\TourPackage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Country\PackageCountry;

class DestinationController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Destination List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $destinationData = PackageCountry::all();

        return view('frontend.destination.destination',compact('destinationData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Tours Destination detail Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function destinationDetail($id,$slug){

        $tourPackages = TourPackage::select("*")
            ->where('SLUG', $slug)
            ->where('COUNTRY_ID', $id)
            ->where('STATUS', '1')->get();

        return view('frontend.tours.tours',compact('tourPackages'));
    }
}
