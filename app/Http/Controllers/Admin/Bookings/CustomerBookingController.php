<?php

namespace App\Http\Controllers\Admin\Bookings;

use File;
use Image;
use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Log\ActivityLog;
use App\Models\Tour\TourPackage;
use App\Models\Booking\PackageBooking;


class CustomerBookingController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Customer Booking List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        // $packageBooking = PackageBooking::all();
        $packageBooking = PackageBooking::select('package_bookings.*', 'tour_packages.PACKAGE_NAME')
        ->join('tour_packages', 'tour_packages.id', '=', 'package_bookings.PACKAGE_ID')
        ->get();

        return view('admin.bookings.index',compact('packageBooking'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Customer Booking Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadCustomerBookingEditPage($id){

        $bookedPackageData = PackageBooking::select('package_bookings.*', 'tour_packages.PACKAGE_NAME')
        ->join('tour_packages', 'tour_packages.id', '=', 'package_bookings.PACKAGE_ID')
        ->where('package_bookings.id', '=', $id)
        ->get();

        return view('admin.bookings.edit',compact('bookedPackageData'));

    }

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Customer Booking Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerBookingUpdate(Request $request){

        $validated = $request->validate([
            'NAME' => 'required',
            'CONTACT_NO'=>'required',
            'EMAIL' => 'required',
            'TOTAL_PAX'=>'required',
            'TOTAL_ADULT'=>'required',
            'TOTAL_CHILD' => 'required',
            'TOTAL_INFANT' => 'required',
            'START_DATE' => 'required',
        ]);


        PackageBooking::where('id', $request->id)->update([
            'NAME' => $request->NAME,
            'CONTACT_NO' => $request->CONTACT_NO,
            'EMAIL' => $request->EMAIL,
            'TOTAL_PAX' => $request->TOTAL_PAX,
            'TOTAL_ADULT' => $request->TOTAL_ADULT,
            'TOTAL_CHILD' => $request->TOTAL_CHILD,
            'TOTAL_INFANT' => $request->TOTAL_INFANT,
            'START_DATE' => $request->START_DATE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated booked package of ".$request->NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('bookings.show')->with('crudMsg','Updated booked package of '.$request->NAME.'.');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Customer Booking
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerBookingDelete($id){

        PackageBooking::where('id', $id)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted selected booking.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Deleted selected booking.');
    }
}
