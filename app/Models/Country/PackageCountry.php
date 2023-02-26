<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'COUNTRY_NAME',
        'STATUS',
        'SLUG',
        'SORT_ORDER',
        'FILE_NAME',
        'FILE_PATH',
        'CREATOR',
        'EDITOR',
    ];
}
