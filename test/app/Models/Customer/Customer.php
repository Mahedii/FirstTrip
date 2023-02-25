<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'CUSTOMER_NAME',
        'EMAIL',
        'PHONE',
        'MOBILE',
        'GST_NUMBER',
        'TAX_NUMBER',
        'PREVIOUS_DUE',
        'OFFICE_ADDRESS',
        'SHIPPING_ADDRESS',
        'SLUG',
        'SORT_ORDER',
        'EDITOR',
    ];
}
