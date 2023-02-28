<?php

namespace App\Models\Partners;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlinePartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'NAME',
        'STATUS',
        'FILE_NAME',
        'FILE_PATH',
        'SLUG',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
