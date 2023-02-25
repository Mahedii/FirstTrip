<?php

namespace App\Models\ToDo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoTaskAssignedTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'TASK_ID',
        'ASSIGNED_USER_ID',
        'CREATOR',
        'EDITOR',
    ];
}
