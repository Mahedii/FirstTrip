<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackageExcludedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'PACKAGE_ID',
        'EXCLUDED_SERVICE',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
