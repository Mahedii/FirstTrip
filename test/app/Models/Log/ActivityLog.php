<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'USER_ID',
        'USER_NAME',
        'ACTION',
        'CARD_COLOR',
        'FAVOURITE',
        'SORT_ORDER',
    ];
}
