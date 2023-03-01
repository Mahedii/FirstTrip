<?php

namespace App\Models\AboutSection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSectionTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'TITLE',
        'SUBTITLE',
        'VIDEO_PATH',
        'TEXT_1',
        'TEXT_2',
        'TEXT_3',
        'TEXT_4',
        'FILE_NAME',
        'FILE_PATH',
        'STATUS',
        'EDITOR',
    ];
}
