<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillList extends Model
{
    use HasFactory;

    protected $fillable = [
        'PURCHASE_ORDER_LIST_ID',
        'STATUS',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
