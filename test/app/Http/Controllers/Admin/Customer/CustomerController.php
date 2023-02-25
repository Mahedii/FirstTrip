<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use File;
use Image;
use Illuminate\Support\Arr;

use App\Models\Customer\Customer;
use App\Models\Log\ActivityLog;

class CustomerController extends Controller{


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Role Permissions
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    function __construct(){
        
        $this->middleware('permission:see-customer', ['only' => ['index','generateSlug']]);
        $this->middleware('permission:create-customer', ['only' => ['index','customerAddPage','customerInsert']]);
        $this->middleware('permission:edit-customer', ['only' => ['index','customerEditPageLoad','customerUpdate']]);
        $this->middleware('permission:delete-customer', ['only' => ['customerDelete']]);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Customer List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $customers = Customer::orderBy('CUSTOMER_ID', 'DESC')->get();

        return view('admin.customers.show-list',compact('customers'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Customer Add Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerAddPage(){

        $customers = Customer::all();

        return view('admin.customers.add-customer',compact('customers'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Customer Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerInsert(Request $request){

        $validated = $request->validate([
            'CUSTOMER_NAME' => 'required|max:100',
            'EMAIL'=>'email',
            'MOBILE' => 'required|numeric|digits:11',
            'PREVIOUS_DUE'=>'integer|nullable',

        ],
        [
            'CUSTOMER_NAME.required' => 'Please Enter Customer Name',
        ]);

        // $SLUG = SlugService::createSlug(Customer::class, 'SLUG', $request->CUSTOMER_NAME);
        $SLUG = $this->generateSlug($request->CUSTOMER_NAME);


        $product = Customer::create([
            'CUSTOMER_NAME' => $request->CUSTOMER_NAME,
            'EMAIL' => $request->EMAIL,
            'PHONE' => $request->PHONE,
            'MOBILE' => $request->MOBILE,
            'GST_NUMBER' => $request->GST_NUMBER,
            'TAX_NUMBER' => $request->TAX_NUMBER,
            'PREVIOUS_DUE' => $request->PREVIOUS_DUE,
            'OFFICE_ADDRESS' => $request->OFFICE_ADDRESS,
            'SHIPPING_ADDRESS' => $request->SHIPPING_ADDRESS,
            'EDITOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Added customer information of: ".$request->CUSTOMER_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);


        return redirect()->route('customer.lists')->with('crudMsg','Customer '.$request->CUSTOMER_NAME.' Added Successfully');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Customer Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerEditPageLoad($slug){

        // $customerData = Customer::where('SLUG', $slug)->first();
        $customerData = Customer::where('SLUG', $slug)->get();

        //  //  Query Builder Find Method
        // $customerData = DB::table('customers')->where('SLUG',$slug)->first();

        return view('admin.customers.edit-customer',compact('customerData'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Customer Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'CUSTOMER_NAME' => 'required|max:100',
            'EMAIL'=>'email',
            'MOBILE' => 'required|numeric|digits:11',
            'PREVIOUS_DUE'=>'integer|nullable',

        ],
        [
            'CUSTOMER_NAME.required' => 'Please Enter Customer Name',
        ]);


        

        $update = Customer::where('SLUG', $SLUG)->update([
            'CUSTOMER_NAME' => $request->CUSTOMER_NAME,
            'EMAIL' => $request->EMAIL,
            'PHONE' => $request->PHONE,
            'MOBILE' => $request->MOBILE,
            'GST_NUMBER' => $request->GST_NUMBER,
            'TAX_NUMBER' => $request->TAX_NUMBER,
            'PREVIOUS_DUE' => $request->PREVIOUS_DUE,
            'OFFICE_ADDRESS' => $request->OFFICE_ADDRESS,
            'SHIPPING_ADDRESS' => $request->SHIPPING_ADDRESS,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated customer information of: ".$request->CUSTOMER_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('customer.lists')->with('crudMsg','Customer '.$request->CUSTOMER_NAME.' Updated Successfully');
        // return response()->json(['success' => 'Customer Updated Successfully.']);

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Customer
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function customerDelete($slug){

        $customerInfoData = Customer::select('customers.*')->where('SLUG', '=', $slug)->first();
        $CUSTOMER_NAME = $customerInfoData->CUSTOMER_NAME;

        $customerDelete = Customer::where('SLUG', $slug)->delete();
        // $customerDelete = DB::table('customers')->where('SLUG', $slug)->delete();


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted customer information of: ".$CUSTOMER_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Customer '.$slug.' Permanently Deleted');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Generate Slug
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public static function generateSlug($name){

        $slug=Str::slug($name);
        // dd($slug,"show");

        if (Customer::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(Customer::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }

}
