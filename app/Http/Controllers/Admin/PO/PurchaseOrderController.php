<?php

namespace App\Http\Controllers\Admin\PO;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use Image;
use Validator;
use Response;
use Illuminate\Support\Arr;

use App\Models\PO\PurchaseOrder;
use App\Models\PO\PurchaseOrderList;
use App\Models\PO\BillList;
use App\Models\Customer\Customer;
use App\Models\Log\ActivityLog;

class PurchaseOrderController extends Controller{


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
        
        $this->middleware('permission:see-po', ['only' => ['index','poListDetailPageLoad','generateSlug']]);
        $this->middleware('permission:create-po', ['only' => ['index','poAddPage','poInsert','poVatAit','poListInsert']]);
        $this->middleware('permission:edit-po', ['only' => ['index','poEditPageLoad','poUpdate','poListEditPageLoad','poListUpdate']]);
        $this->middleware('permission:delete-po', ['only' => ['poListDelete']]);
        $this->middleware('permission:print-po', ['only' => ['poPrintView','poAddBill','poListDetail','numberToWord']]);
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load PO List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $purchaseOrder = PurchaseOrder::select('purchase_orders.*', 'users.name', 'customers.CUSTOMER_NAME')
            ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
            ->join('users', 'users.id', '=', 'purchase_orders.CREATOR')
            ->orderBy('purchase_orders.PURCHASE_ORDER_ID', 'DESC')
        	->get();
        $purchaseOrderList = PurchaseOrderList::orderBy('PURCHASE_ORDER_LIST_ID', 'DESC')->get();

        
        return view('admin.po.show-list',compact('purchaseOrder','purchaseOrderList'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load PO Add Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poAddPage(){

        $purchaseOrder = PurchaseOrder::orderBy('PURCHASE_ORDER_ID', 'DESC')->get();
        $customers = Customer::orderBy('CUSTOMER_ID', 'DESC')->get();

        return view('admin.po.add-po',compact('purchaseOrder','customers'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | PO Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poInsert(Request $request){

        $validated = $request->validate([
            'CUSTOMER_ID' => 'required',
            'PO_NO'=>'required|unique:purchase_orders',
            'PO_DATE' => 'required',
            'REF_NO'=>'required|unique:purchase_orders',
            'INVOICE_ADDRESS' => 'required',
            'DELIVERY_ADDRESS' => 'required',
            'VAT'=>'required',
            'AIT'=>'required',
            'NOTE'=>'required',
            'inputFile' => 'mimes:csv,zip,xlx,xls,pdf|max:5120',
        ],
        [
            'CUSTOMER_ID.required' => 'Please Select Customer Name',
        ]);

        // $SLUG = SlugService::createSlug(PurchaseOrder::class, 'SLUG', $request->PO_NO);
        $SLUG = $this->generateSlug($request->PO_NO);

        $fileInput = $request->file('inputFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            //$fileExtension = $fileInput->extension();
            //$fileExtension = strtolower($fileInput->getClientOriginalExtension());

            $path = public_path('frontend/assets/files/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            
            $request->inputFile->move($path, $fileName);

            $filePath = 'frontend/assets/files/'.$SLUG.'/'.$fileName;

        }
        else{
            $fileName = "";
            $filePath = "";
        }

        $po = PurchaseOrder::create([
            'CUSTOMER_ID' => $request->CUSTOMER_ID,
            'PO_NO' => $request->PO_NO,
            'PO_DATE' => $request->PO_DATE,
            'REF_NO' => $request->REF_NO,
            'INVOICE_ADDRESS' => $request->INVOICE_ADDRESS,
            'DELIVERY_ADDRESS' => $request->DELIVERY_ADDRESS,
            'VAT' => $request->VAT,
            'AIT' => $request->AIT,
            'NOTE' => $request->NOTE,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Created PO ".$request->PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->back()->with('crudMsg','PO '.$request->PO_NO.' Added Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Get VAT, AIT
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poVatAit($PO_NO){

        $getVatAIt = PurchaseOrder::select("*")->where('PO_NO', $PO_NO)->first();

        $VAT = $getVatAIt->VAT;
        $AIT = $getVatAIt->AIT;

        return response()->json([
            'VAT' => $VAT,
            'AIT' => $AIT
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected PO Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poEditPageLoad($slug){

        $purchaseOrderData = PurchaseOrder::select('purchase_orders.*', 'customers.CUSTOMER_NAME')
        ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
        ->where('purchase_orders.SLUG', '=', $slug)
        ->orderBy('purchase_orders.PURCHASE_ORDER_ID', 'DESC')
        ->get();
        $customers = Customer::orderBy('CUSTOMER_ID', 'DESC')->get();

        $purchaseOrderAllData = PurchaseOrder::all();
        $po = PurchaseOrder::select("*")->where('SLUG', $slug)->first();
        $PO_NO = $po->PO_NO;

        $purchaseOrderList = PurchaseOrderList::select('purchase_order_lists.*')
        ->where('PO_NO', '=', $PO_NO)
        ->orderBy('PURCHASE_ORDER_LIST_ID', 'ASC')
        ->get();

        // dd($pol);

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('purchase_orders')->where('SLUG',$slug)->first();

        return view('admin.po.edit-po',compact('purchaseOrderData','customers','purchaseOrderAllData','purchaseOrderList'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update PO Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poUpdate(Request $request,$SLUG){

        $validated = $request->validate([
            'CUSTOMER_ID' => 'required',
            'PO_DATE' => 'required',
            'REF_NO'=>'required',
            'INVOICE_ADDRESS' => 'required',
            'DELIVERY_ADDRESS' => 'required',
            'VAT'=>'required',
            'AIT'=>'required',
            'NOTE'=>'required',
            'inputFile' => 'mimes:csv,zip,xlx,xls,pdf|max:5120',
        ],
        [
            'CUSTOMER_ID.required' => 'Please Select Customer Name',
        ]);


        $po = PurchaseOrder::where('SLUG', $SLUG)->first();
        $PO_NO = $po->PO_NO;
        $FILE_PATH = $po->FILE_PATH;
        $filePath = $po->FILE_PATH;
        $fileName = $po->FILE_NAME;

        $fileInput = $request->file('inputFile');

        if ($fileInput) {

            $fileName = $fileInput->getClientOriginalName();

            //$fileExtension = $fileInput->extension();
            //$fileExtension = strtolower($fileInput->getClientOriginalExtension());

            $path = public_path('frontend/assets/files/'.$SLUG.'/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            
            $request->inputFile->move($path, $fileName);

            $filePath = 'frontend/assets/files/'.$SLUG.'/'.$fileName;

            
            if( File::exists(public_path($FILE_PATH)) ) {
                File::delete(public_path($FILE_PATH));
            }

            

        }


        $update = PurchaseOrder::where('SLUG', $SLUG)->update([
            'CUSTOMER_ID' => $request->CUSTOMER_ID,
            'PO_DATE' => $request->PO_DATE,
            'REF_NO' => $request->REF_NO,
            'INVOICE_ADDRESS' => $request->INVOICE_ADDRESS,
            'DELIVERY_ADDRESS' => $request->DELIVERY_ADDRESS,
            'VAT' => $request->VAT,
            'AIT' => $request->AIT,
            'NOTE' => $request->NOTE,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated PO ".$PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->route('po.lists')->with('crudMsg','PO '.$request->SLUG.' Updated Successfully');
        // return response()->json(['success' => 'PO Updated Successfully.']);

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete PO
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poDelete($slug){

        $po = PurchaseOrder::select("*")->where('SLUG', $slug)->first();
        $PO_NO = $po->PO_NO;
        $FILE_PATH = $po->FILE_PATH;
        

        if( File::exists(public_path($FILE_PATH)) ) {
            File::delete(public_path($FILE_PATH));
        }

        File::deleteDirectory(public_path('frontend/assets/files/'.$slug));

        $poDelete = PurchaseOrder::where('SLUG', $slug)->delete();
        // $poDelete = DB::table('purchase_orders')->where('SLUG', $slug)->delete();

        $polDelete = PurchaseOrderList::where('PO_NO', $PO_NO)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted PO ".$PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','PO '.$slug.' Permanently Deleted');
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Download File
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function downloadFile($FILE_NAME,$FILE_PATH){

        $filePath = public_path($FILE_PATH);

        return Response::download($filePath);
        return response()->download($filePath);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | View Selected PO Details Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poListDetailPageLoad($slug){

        $purchaseOrderData = PurchaseOrder::select('purchase_orders.*', 'customers.CUSTOMER_NAME')
        ->join('customers', 'customers.CUSTOMER_ID', '=', 'purchase_orders.CUSTOMER_ID')
        ->where('purchase_orders.SLUG', '=', $slug)
        ->orderBy('purchase_orders.PURCHASE_ORDER_ID', 'DESC')
        ->get();
        $customers = Customer::orderBy('CUSTOMER_ID', 'DESC')->get();

        $purchaseOrderAllData = PurchaseOrder::all();
        $po = PurchaseOrder::select("*")->where('SLUG', $slug)->first();
        $PO_NO = $po->PO_NO;

        $purchaseOrderList = PurchaseOrderList::select('purchase_order_lists.*')
        ->where('PO_NO', '=', $PO_NO)
        ->orderBy('PURCHASE_ORDER_LIST_ID', 'ASC')
        ->get();

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('purchase_orders')->where('SLUG',$slug)->first();

        return view('admin.po.view-po-details',compact('purchaseOrderData','customers','purchaseOrderAllData','purchaseOrderList'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | PO List Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poListInsert(Request $request){

        // dd((count($request->SL)));  

        $validated = Validator::make($request->all(), [
            'PO_NO'=>'required',
            'SL'=>'required|array',
            'SL.*'=>'required|string',
            'ITEM_CODE'=>'required|array',
            'ITEM_CODE.*'=>'required|string',
            'DELIVERY_DATE'=>'required|array',
            'DELIVERY_DATE.*'=>'required|string',
            'UNIT'=>'required|array',
            'UNIT.*'=>'required|string',
            'UNIT_PRICE'=>'required|array',
            'UNIT_PRICE.*'=>'required|string',
            'QUANTITY'=>'required|array',
            'QUANTITY.*'=>'required|string',

        ],
        [
            'PO_NO.required' => 'Please Select Purchase Order',
            // 'SL.*.required' => 'Please Insert SL No',
        ]);

        if ($validated->passes()) {

            count($request->SL);
            $PO_NO = $request->PO_NO;

            if(count($request->SL) > 0){  
                for($i=0; $i<count($request->SL); $i++){

                    $poList = PurchaseOrderList::create([
                        'PO_NO' => $PO_NO,
                        'SL' => $request->SL[$i],
                        'ITEM_CODE' => $request->ITEM_CODE[$i],
                        'DELIVERY_DATE' => $request->DELIVERY_DATE[$i],
                        'PRODUCT_DESCRIPTION' => $request->PRODUCT_DESCRIPTION[$i],
                        'UNIT' => $request->UNIT[$i],
                        'UNIT_PRICE' => $request->UNIT_PRICE[$i],
                        'QUANTITY' => $request->QUANTITY[$i],
                        'CREATOR' => Auth::user()->id
                    ]); 

                    $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
                    $random_color = Arr::random($color_array);
                    $ACTION = "Inserted product ".$PO_NO." informations in PO ".$PO_NO.".";

                    $log = ActivityLog::create([
                        'USER_ID' => Auth::user()->id,
                        'USER_NAME' => Auth::user()->name,
                        'ACTION' => $ACTION,
                        'CARD_COLOR' => $random_color
                    ]);
                }  
 
            } 

            

            // dd($PURCHASE_ORDER_ID);

            // $poList = PurchaseOrderList::create([
            //     'PO_NO' => $request->PO_NO,
            //     'SL' => $request->SL,
            //     'ITEM_CODE' => $request->ITEM_CODE,
            //     'DELIVERY_DATE' => $request->DELIVERY_DATE,
            //     'PRODUCT_DESCRIPTION' => $request->PRODUCT_DESCRIPTION,
            //     'UNIT' => $request->UNIT,
            //     'UNIT_PRICE' => $request->UNIT_PRICE,
            //     'QUANTITY' => $request->QUANTITY,
            //     'VAT' => $request->VAT,
            //     'AIT' => $request->AIT,
            //     'NOTE' => $request->NOTE,
            //     'CREATOR' => Auth::user()->name
            // ]);

            return response()->json(['success'=>'Record is successfully added']);
            // return redirect()->back()->with('crudMsgPO','This Item is Successfully Added to The List');

        }
        else{
            // return response()->json(['error'=>$validated->errors()]);
            return response()->json(['errors'=>$validated->errors()->all()]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected PO List Details Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poListEditPageLoad($listID){

        $purchaseOrderData = PurchaseOrder::all();
        $purchaseOrderList = PurchaseOrderList::select('purchase_order_lists.*')
        ->where('PURCHASE_ORDER_LIST_ID', '=', $listID)
        ->orderBy('PURCHASE_ORDER_LIST_ID', 'DESC')
        ->get();

        //  //  Query Builder Find Method
        // $purchaseOrderData = DB::table('purchase_orders')->where('SLUG',$slug)->first();

        return view('admin.po.edit-po-details',compact('purchaseOrderData','purchaseOrderList'));

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update PO List Details Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poListUpdate(Request $request,$listID){

        $validated = $request->validate([
            'PO_NO'=>'required',
            'SL'=>'required',
            'ITEM_CODE'=>'required',
            'DELIVERY_DATE'=>'required',
            'UNIT'=>'required',
            'UNIT_PRICE'=>'required',
            'QUANTITY'=>'required',

        ],
        [
            'PO_NO.required' => 'Please Select Purchase Order',
        ]);

        $po = PurchaseOrder::select("*")->where('PO_NO', $request->PO_NO)->first();
        $SLUG = $po->SLUG;


        $update = PurchaseOrderList::where('PURCHASE_ORDER_LIST_ID', $listID)->update([
            'PO_NO' => $request->PO_NO,
            'SL' => $request->SL,
            'ITEM_CODE' => $request->ITEM_CODE,
            'DELIVERY_DATE' => $request->DELIVERY_DATE,
            'PRODUCT_DESCRIPTION' => $request->PRODUCT_DESCRIPTION,
            'UNIT' => $request->UNIT,
            'UNIT_PRICE' => $request->UNIT_PRICE,
            'QUANTITY' => $request->QUANTITY,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated product informations in PO ".$request->PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        
        return redirect()->route('po.editpage.load',$SLUG)->with('crudMsg','PO '.$request->PO_NO.' Details Updated Successfully');
        // return response()->json(['success' => 'PO Updated Successfully.']);

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete PO List Deatil 
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poListDelete($listID){

        $pol = PurchaseOrderList::select("*")->where('PURCHASE_ORDER_LIST_ID', $listID)->first();
        $PO_NO = $pol->PO_NO;
        $ITEM_CODE = $pol->ITEM_CODE;

        $poListDelete = PurchaseOrderList::where('PURCHASE_ORDER_LIST_ID', $listID)->delete();
        // $poListDelete = DB::table('purchase_order_lists')->where('PURCHASE_ORDER_LIST_ID', $listID)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted product ".$ITEM_CODE." informations from PO ".$PO_NO.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsgPO','PO List Detail Permanently Deleted');
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

        if (PurchaseOrder::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(PurchaseOrder::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Selected PO List For Print
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poPrintView(Request $request){

        $checkboxes = $request->input('checkbox');

        // dd($checkboxes);

        $count = 1;

        foreach($checkboxes as $id) {

            if($count == 1){

                $getPoID = PurchaseOrderList::where('PURCHASE_ORDER_LIST_ID', $id)->first();
                $PO_NO = $getPoID->PO_NO;
                $NOTE = $getPoID->NOTE;
                $getPoDetail = PurchaseOrder::select("*")->where('PO_NO', $PO_NO)->get();

                $getCustomerID = PurchaseOrder::where('PO_NO', $PO_NO)->first();
                $CUSTOMER_ID = $getCustomerID->CUSTOMER_ID;
                $getCustomerDetail = Customer::select("*")->where('CUSTOMER_ID', $CUSTOMER_ID)->get();

            }
            
            $count++;
  
        }

        return view('admin.po.print.invoice',compact('checkboxes','getPoDetail','getCustomerDetail','NOTE'));

        // dd($request);

        // foreach($checkboxes as $id) {
        //     DB::table('customer')->where('id', $id)->delete();
        // }

        
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Add Bill To The Database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function poAddBill(Request $request){

        $STATUS = "DUE";

        $checkboxes = $request->input('checkboxes');

        // dd($request);

        $emptyArray = [];
        $error = 0;

        foreach($checkboxes as $id) {

            $getDetail = PurchaseOrderList::where('PURCHASE_ORDER_LIST_ID', $id)->first();
            $PO_NO = $getDetail->PO_NO;
            $ITEM_CODE = $getDetail->ITEM_CODE;

            if (BillList::where('PURCHASE_ORDER_LIST_ID', '=', $id)->exists()) {
                // bill found
                
                $emptyArray[] = $ITEM_CODE;
                $error = 1;
            }
            else{

                $poList = BillList::create([
                    'PURCHASE_ORDER_LIST_ID' => $id,
                    'STATUS' => $STATUS,
                    'CREATOR' => Auth::user()->id
                ]);

                $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
                $random_color = Arr::random($color_array);
                $ACTION = "Inserted product ".$ITEM_CODE." from PO ".$PO_NO." into DUE bill List.";
        
                $log = ActivityLog::create([
                    'USER_ID' => Auth::user()->id,
                    'USER_NAME' => Auth::user()->name,
                    'ACTION' => $ACTION,
                    'CARD_COLOR' => $random_color
                ]);
            }
  
        }

        
        return response()->json([
            'error' => $error,
            'itemCodes' => $emptyArray
        ]);
        // return Response()->json($emptyArray);
        // return Redirect()->route('po.lists')->with('crudMsg','Bill Added Successfully');
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
