<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'PACKAGE_ID',
        'TOUR_PLAN_TITLE_TEXT',
        'TOUR_PLAN_TITLE_BODY',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
