<?php

namespace App\Http\Controllers\Admin\Bill;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


use App\Models\PO\PurchaseOrder;
use App\Models\PO\PurchaseOrderList;
use App\Models\PO\BillList;
use App\Models\Customer\Customer;
use App\Models\Log\ActivityLog;

class BillController extends Controller{


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
        
        $this->middleware('permission:see-bills', ['only' => ['index','billPrintView','poListDetail','numberToWord']]);
        $this->middleware('permission:edit-bills', ['only' => ['index','billEditPageLoad','billUpdate']]);
        $this->middleware('permission:delete-bills', ['only' => ['billDelete']]);
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Bill List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $billList = BillList::select('bill_lists.*', 'purchase_orders.*', 'users.name', 'purchase_order_lists.*', 'customers.CUSTOMER_NAME')
            ->join('purchase_order_lists', 'purchase_order_lists.PURCHASE_ORDER_LIST_ID', '=', 'bill_lists.PURCHASE_ORDER_LIST_ID')
            ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
            ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
            ->join('users', 'users.id', '=', 'bill_lists.CREATOR')
            ->orderBy('bill_lists.BILL_LIST_ID', 'DESC')
        	->get();
        

        
        return view('admin.bill.show-list',compact('billList'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Bill Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function billEditPageLoad($id){

        $billDetail = BillList::select('bill_lists.*', 'purchase_orders.*', 'purchase_order_lists.*', 'customers.CUSTOMER_NAME')
            ->join('purchase_order_lists', 'purchase_order_lists.PURCHASE_ORDER_LIST_ID', '=', 'bill_lists.PURCHASE_ORDER_LIST_ID')
            ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
            ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
            ->where('bill_lists.BILL_LIST_ID', '=', $id)
            ->orderBy('bill_lists.BILL_LIST_ID', 'DESC')
        	->first();

            $BILL_LIST_ID = $billDetail->BILL_LIST_ID;
            $PO_NO = $billDetail->PO_NO;
            $ITEM_CODE = $billDetail->ITEM_CODE;
            $STATUS = $billDetail->STATUS;

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('purchase_orders')->where('SLUG',$slug)->first();

        // return response()->json($billDetail);
        return response()->json([
            'BILL_LIST_ID' => $BILL_LIST_ID,
            'PO_NO' => $PO_NO,
            'ITEM_CODE' => $ITEM_CODE,
            'STATUS' => $STATUS
        ]);
        // return view('admin.bill.show-list',compact('billDetail'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Bill Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function billUpdate(Request $request){

        $validated = $request->validate([
            'STATUS' => 'required',

        ]);

        $BILL_LIST_ID = $request->BILL_LIST_ID;
        $ITEM_CODE = $request->ITEM_CODE;
        $PO_NO = $request->PO_NO;


        $update = BillList::where('BILL_LIST_ID', $BILL_LIST_ID)->update([
            'STATUS' => $request->STATUS,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated Bill Status of PO ".$PO_NO." to ".$request->STATUS.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('bill.lists')->with('crudMsg','Bill Status of Item Code: '.$request->ITEM_CODE.' Updated Successfully');
        // return response()->json(['success' => 'PO Updated Successfully.']);

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Bill
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function billDelete($id){

        $get_po_no = BillList::select('bill_lists.*', 'purchase_order_lists.PO_NO')
            ->join('purchase_order_lists', 'purchase_order_lists.PURCHASE_ORDER_LIST_ID', '=', 'bill_lists.PURCHASE_ORDER_LIST_ID')
            ->where('bill_lists.BILL_LIST_ID', '=', $id)
        	->first();
        $PO_NO = $get_po_no->PO_NO;

        $billDelete = BillList::where('BILL_LIST_ID', $id)->delete();
        // $billDelete = DB::table('bill_lists')->where('BILL_LIST_ID', $id)->delete();


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted Bill data of PO ".$PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Bill Permanently Deleted');
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Selected Bill In Print View
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function billPrintView($id){

        $getPoID = PurchaseOrderList::select("*")->where('PURCHASE_ORDER_LIST_ID', $id)->first();
        $PO_NO = $getPoID->PO_NO;
        $NOTE = $getPoID->NOTE;
        $getPoDetail = PurchaseOrder::select("*")->where('PO_NO', $PO_NO)->get();

        $getCustomerID = PurchaseOrder::where('PO_NO', $PO_NO)->first();
        $CUSTOMER_ID = $getCustomerID->CUSTOMER_ID;
        $getCustomerDetail = Customer::select("*")->where('CUSTOMER_ID', $CUSTOMER_ID)->get();

        $checkboxes = [];
        $checkboxes[] = $id;

        $getPayStatus = BillList::select("*")->where('PURCHASE_ORDER_LIST_ID', $id)->first();
        $STATUS = $getPayStatus->STATUS;

        return view('admin.bill.view-bill-details',compact('checkboxes','getPoDetail','getCustomerDetail','NOTE','STATUS'));

        // dd($request);

        
    }


    public static function poListDetail($id){
        return $getPoListDetail = PurchaseOrderList::select("*")->where('PURCHASE_ORDER_LIST_ID', $id)->get();
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Number To Word Conversion
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public static function numberToWord($num = ''){

        $num    = ( string ) ( ( int ) $num );
        
        if( ( int ) ( $num ) && ctype_digit( $num ) ){

            $words  = array( );
             
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
             
            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');
             
            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');
             
            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');
             
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
             
            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                 
                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }
             
            $words  = implode( ', ' , $words );
             
            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' and' , $words );
            }
             
            return $words;
        }
        else if( ! ( ( int ) $num ) ){

            return 'Zero';
        }
        return '';
    }




}
