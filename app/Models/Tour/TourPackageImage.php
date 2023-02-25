<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackageImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'PACKAGE_ID',
        'FILE_NAME',
        'FILE_PATH',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
