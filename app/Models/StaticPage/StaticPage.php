<?php

namespace App\Models\StaticPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ABOUT_PAGE',
        'FAQ_PAGE',
        'PRIVACY_PAGE',
        'REFUND_PAGE',
        'TERMS_&_CONDITION_PAGE',
        'CREATOR',
        'EDITOR',
    ];
}
