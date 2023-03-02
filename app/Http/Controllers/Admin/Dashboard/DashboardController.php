<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use File;
use Image;

use App\Models\Tender\TenderBill;
use App\Models\Tender\TenderInfo;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\PurchaseOrderList;
use App\Models\PO\BillList;
use App\Models\Customer\Customer;
use App\Models\Booking\PackageBooking;
use App\Models\Country\PackageCountry;

class DashboardController extends Controller{


    public static function getAllCountry()
    {
    	$allCountry = PackageCountry::all();

    	return $allCountry;
    }

    public static function pieChart()
    {
    	$Laptop = PackageCountry::where('product_type','Laptop')->get();

    	return view('echart',compact('laptop_count','phone_count','desktop_count'));
    }

    public static function totalBookingReq()
    {
    	$PackageBooking = PackageBooking::all();

    	return $PackageBooking->count();
    }

    public static function weeklyBookingReq()
    {
        $PackageBooking = PackageBooking::select("*")
                ->whereBetween('created_at',
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                    )
                ->get();

    	return $PackageBooking->count();
    }

    public static function todaysBookingReq()
    {
        $PackageBooking = PackageBooking::whereDate('created_at', Carbon::today())->get();

    	return $PackageBooking->count();
    }

}
