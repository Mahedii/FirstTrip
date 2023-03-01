<?php

namespace App\Models\AboutSection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSectionOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'TITLE',
        'SUBTITLE',
        'TITLE_BODY',
        'DISCOUNT',
        'FILE_NAME',
        'FILE_PATH',
        'EDITOR',
    ];
}
