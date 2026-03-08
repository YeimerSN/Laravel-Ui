<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $filable = [
        'title',
        'detail',
        'is_completed',
        'priority'
    ];
}
