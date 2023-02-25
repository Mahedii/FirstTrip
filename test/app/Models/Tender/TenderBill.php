<?php

namespace App\Models\Tender;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'SL',
        'COMPANY_NAME',
        'DATE',
        'CHEQUE_NO',
        'AMOUNT',
        'TENDER_ID',
        'SLUG',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
