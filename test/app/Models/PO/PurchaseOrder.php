<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'CUSTOMER_ID',
        'PO_NO',
        'PO_DATE',
        'REF_NO',
        'INVOICE_ADDRESS',
        'DELIVERY_ADDRESS',
        'VAT',
        'AIT',
        'NOTE',
        'FILE_NAME',
        'FILE_PATH',
        'SLUG',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
