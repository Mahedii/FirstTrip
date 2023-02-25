<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackageIncludedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'PACKAGE_ID',
        'INCLUDED_SERVICE',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
