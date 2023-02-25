<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'PO_NO',
        'SL',
        'ITEM_CODE',
        'UNIT',
        'UNIT_PRICE',
        'QUANTITY',
        'DELIVERY_DATE',
        'PRODUCT_DESCRIPTION',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
