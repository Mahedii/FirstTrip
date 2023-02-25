<?php

namespace App\Models\ToDo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'PROJECT_ID',
        'TASK_NAME',
        'TASK_DESCRIPTION',
        'STATUS',
        'PRIORITY',
        'DUE_DATE',
        'SORT_ORDER',
        'CREATOR',
        'EDITOR',
    ];
}
