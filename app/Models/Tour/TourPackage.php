<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'PACKAGE_NAME',
        'DURATION',
        'TOUR_TYPE',
        'COUNTRY_ID',
        'DESTINATION',
        'COST',
        'OVERVIEW',
        'STATUS',
        'FILE_NAME',
        'FILE_PATH',
        'SLUG',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
