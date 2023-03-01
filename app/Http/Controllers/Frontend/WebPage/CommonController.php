<?php

namespace App\Http\Controllers\Frontend\WebPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Response;
// use Validator;
use Illuminate\Validation\Validator;
use Carbon\Carbon;
use App\Models\StaticPage\StaticPage;
use App\Models\Booking\PackageBooking;


class CommonController extends Controller{

    public function aboutPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.about',compact('pagesData'));
    }

    public function faqPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.faq',compact('pagesData'));
    }

    public function refundPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.privacy',compact('pagesData'));
    }

    public function privacyPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.refund',compact('pagesData'));
    }

    public function termsConditionPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.terms',compact('pagesData'));
    }

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Package booking data from frontend- Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function packageBookingInsert(Request $request){

        // dd($request);

        $validated = $this->validate($request, [
            'NAME'=>'required',
            'PACKAGE_ID'=>'required',
            'CONTACT_NO'=>'required|numeric|digits:11',
            'EMAIL'=>'required|email',
            'START_DATE'=>'required',
            'TOTAL_PAX'=>'required|numeric',
            'TOTAL_ADULT'=>'required|numeric',
            'TOTAL_CHILD'=>'required|numeric',
            'TOTAL_INFANT'=>'required|numeric',
            'checkbox'=>'accepted',
        ],
        [
            'NAME.required' => 'Please give a name',
            'CONTACT_NO.required' => 'Phone no can not be empty',
            'CONTACT_NO.numeric' => 'Phone no must contain only numbers',
            'CONTACT_NO.digits' => 'Phone no must be 11 digit',
            'EMAIL.required' => 'Email is required',
            'START_DATE.required' => 'Please select a date',
            'TOTAL_PAX.required' => 'Please enter total number of passenger',
            'TOTAL_ADULT.required' => 'Please enter total number of adult',
            'TOTAL_CHILD.required' => 'Please enter total number of child',
            'TOTAL_INFANT.required' => 'Please enter total number of infant',
            'TOTAL_PAX.numeric' => 'Pax number should contain only number',
            'TOTAL_ADULT.numeric' => 'Number of Adult should contain only number',
            'TOTAL_CHILD.numeric' => 'Number of child should contain only number',
            'TOTAL_INFANT.numeric' => 'Number of infant should contain only number',
            'checkbox.accepted' => 'To proceed, you must agree to our terms & condition',
        ]);



        PackageBooking::create([
            'NAME' => $request->NAME,
            'PACKAGE_ID' => $request->PACKAGE_ID,
            'CONTACT_NO' => $request->CONTACT_NO,
            'EMAIL' => $request->EMAIL,
            'START_DATE' => $request->START_DATE,
            'TOTAL_PAX' => $request->TOTAL_PAX,
            'TOTAL_ADULT' => $request->TOTAL_ADULT,
            'TOTAL_CHILD' => $request->TOTAL_CHILD,
            'TOTAL_INFANT' => $request->TOTAL_INFANT,
            'created_at' => Carbon::now()
        ]);

        // dd($request->COUNTRY_ID);




        return redirect()->back()->with('crudMsg','Booking request created successfully.');
    }

}
