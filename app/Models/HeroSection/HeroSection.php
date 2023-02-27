<?php

namespace App\Models\HeroSection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'TITLE',
        'SUBTITLE',
        'STATUS',
        'SLUG',
        'SORT_ORDER',
        'FILE_NAME',
        'FILE_PATH',
        'CREATOR',
        'EDITOR',
    ];
}
