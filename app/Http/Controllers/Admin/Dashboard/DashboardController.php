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


    public static function totalPo(){

        $totalPo = 0;

        if (PurchaseOrderList::select("*")->exists()) {

            // $pol = PurchaseOrderList::all();
            $pol = PurchaseOrderList::select('purchase_order_lists.*', 'purchase_orders.VAT', 'purchase_orders.AIT')
            ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
            ->orderBy('purchase_order_lists.PO_NO', 'ASC')
            ->get();

            foreach($pol as $data){

                $UNIT_PRICE = $data->UNIT_PRICE;
                $QUANTITY = $data->QUANTITY;
                $TOTAL = $UNIT_PRICE*$QUANTITY;

                $VAT = $data->VAT;
                $AIT = $data->AIT;

                if($VAT > 0 && $AIT > 0){

                    $totalPoWithVAT = ($TOTAL+$TOTAL*($VAT/100));
                    $totalPoWithVATAIT = ($totalPoWithVAT+$totalPoWithVAT*($AIT/100));

                    $totalPo += $totalPoWithVATAIT;
                }
                else if($VAT > 0 && $AIT <= 0){

                    $totalPoWithVAT = ($TOTAL+$TOTAL*($VAT/100));

                    $totalPo += $totalPoWithVAT;
                }
                else if($VAT <= 0 && $AIT > 0){

                    $totalPoWithAIT = ($TOTAL+$TOTAL*($AIT/100));

                    $totalPo += $totalPoWithAIT;
                }
                else if($VAT <= 0 && $AIT <= 0){

                    $totalPo += $TOTAL;
                }

            }
        }

        return $totalPo;
    }

    public static function dueBill(){

        $dueBill = 0;

        if (BillList::select("*")->where('STATUS', 'DUE')->exists()) {

            $getDueBill = BillList::select("*")->where('STATUS', 'DUE')->get();

            foreach($getDueBill as $data){

                // $billDetail = PurchaseOrderList::select("*")->where('PURCHASE_ORDER_LIST_ID', $data->PURCHASE_ORDER_LIST_ID)->first();
                $billDetail = PurchaseOrderList::select('purchase_order_lists.*', 'purchase_orders.VAT', 'purchase_orders.AIT')
                ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
                ->where('purchase_order_lists.PURCHASE_ORDER_LIST_ID', '=', $data->PURCHASE_ORDER_LIST_ID)
                ->orderBy('purchase_order_lists.PO_NO', 'ASC')
                ->first();

                $UNIT_PRICE = $billDetail->UNIT_PRICE;
                $QUANTITY = $billDetail->QUANTITY;
                $TOTAL = $UNIT_PRICE*$QUANTITY;

                $VAT = $billDetail->VAT;
                $AIT = $billDetail->AIT;

                if($VAT > 0 && $AIT > 0){

                    $dueBillWithVAT = ($TOTAL+$TOTAL*($VAT/100));
                    $dueBillWithVATAIT = ($dueBillWithVAT+$dueBillWithVAT*($AIT/100));

                    $dueBill = $dueBillWithVATAIT;
                }
                else if($VAT > 0 && $AIT <= 0){

                    $dueBillWithVAT = ($TOTAL+$TOTAL*($VAT/100));

                    $dueBill = $dueBillWithVAT;
                }
                else if($VAT <= 0 && $AIT > 0){

                    $dueBillWithAIT = ($TOTAL+$TOTAL*($AIT/100));

                    $dueBill = $dueBillWithAIT;
                }
                else if($VAT <= 0 && $AIT <= 0){

                    $dueBill = $TOTAL;
                }

            }
        }

        return $dueBill;
    }


    public static function paidBill(){

        $paidBill = 0;

        if (BillList::select("*")->where('STATUS', 'PAID')->exists()) {

            $getPaidBill = BillList::select("*")->where('STATUS', 'PAID')->get();

            foreach($getPaidBill as $data){

                // $billDetail = PurchaseOrderList::select("*")->where('PURCHASE_ORDER_LIST_ID', $data->PURCHASE_ORDER_LIST_ID)->first();
                $billDetail = PurchaseOrderList::select('purchase_order_lists.*', 'purchase_orders.VAT', 'purchase_orders.AIT')
                ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
                ->where('purchase_order_lists.PURCHASE_ORDER_LIST_ID', '=', $data->PURCHASE_ORDER_LIST_ID)
                ->orderBy('purchase_order_lists.PO_NO', 'ASC')
                ->first();

                $UNIT_PRICE = $billDetail->UNIT_PRICE;
                $QUANTITY = $billDetail->QUANTITY;
                $TOTAL = $UNIT_PRICE*$QUANTITY;

                $VAT = $billDetail->VAT;
                $AIT = $billDetail->AIT;

                if($VAT > 0 && $AIT > 0){

                    $paidBillWithVAT = ($TOTAL+$TOTAL*($VAT/100));
                    $paidBillWithVATAIT = ($paidBillWithVAT+$paidBillWithVAT*($AIT/100));

                    $paidBill = $paidBillWithVATAIT;
                }
                else if($VAT > 0 && $AIT <= 0){

                    $paidBillWithVAT = ($TOTAL+$TOTAL*($VAT/100));

                    $paidBill = $paidBillWithVAT;
                }
                else if($VAT <= 0 && $AIT > 0){

                    $paidBillWithAIT = ($TOTAL+$TOTAL*($AIT/100));

                    $paidBill = $paidBillWithAIT;
                }
                else if($VAT <= 0 && $AIT <= 0){

                    $paidBill = $TOTAL;
                }

            }
        }

        return $paidBill;
    }


    public static function totalVat(){

        $totalVat = 0;

        if (PurchaseOrderList::select("*")->exists()) {

            // $polDetail = PurchaseOrderList::all();
            $polDetail = PurchaseOrderList::select('purchase_order_lists.*', 'purchase_orders.VAT', 'purchase_orders.AIT')
                ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
                ->orderBy('purchase_order_lists.PO_NO', 'ASC')
                ->get();

            foreach($polDetail as $data){

                $UNIT_PRICE = $data->UNIT_PRICE;
                $QUANTITY = $data->QUANTITY;
                $TOTAL = $UNIT_PRICE*$QUANTITY;

                $VAT = $data->VAT;

                if($VAT > 0){

                    $totalVat += ($TOTAL*($VAT/100));

                }


            }
        }

        return $totalVat;
    }


    public static function totalAit(){

        $totalAit = 0;

        if (PurchaseOrderList::select("*")->exists()) {

            // $polDetail = PurchaseOrderList::all();
            $polDetail = PurchaseOrderList::select('purchase_order_lists.*', 'purchase_orders.VAT', 'purchase_orders.AIT')
                ->join('purchase_orders', 'purchase_orders.PO_NO', '=', 'purchase_order_lists.PO_NO')
                ->orderBy('purchase_order_lists.PO_NO', 'ASC')
                ->get();

            foreach($polDetail as $data){

                $UNIT_PRICE = $data->UNIT_PRICE;
                $QUANTITY = $data->QUANTITY;
                $TOTAL = $UNIT_PRICE*$QUANTITY;

                $AIT = $data->AIT;

                if($AIT > 0){

                    $totalAit += ($TOTAL*($AIT/100));

                }


            }
        }

        return $totalAit;
    }
}
