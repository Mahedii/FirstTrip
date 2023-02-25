<?php

namespace App\Models\Tender;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'TENDER_ID',
        'DESCRIPTION',
        'ORGANIZATION',
        'AMOUNT',
        'YEAR',
        'PURCHASE_DEADLINE',
        'TOTAL_PURCHASE_AMOUNT',
        'TOTAL_ITEMS',
        'PURCHASE_QUANTITY',
        'PURCHASE_DUE_ITEMS',
        'DELIVERY_ITEMS',
        'ITEMS_DELIVERY_DUE',
        'SLUG',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
