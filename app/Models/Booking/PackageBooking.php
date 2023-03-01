<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'NAME',
        'CONTACT_NO',
        'EMAIL',
        'START_DATE',
        'END_DATE',
        'TOTAL_PAX',
        'TOTAL_ADULT',
        'TOTAL_CHILD',
        'TOTAL_INFANT',
        'EDITOR',
    ];
}
