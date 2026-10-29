<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'is_done'];

    protected $casts = ['is_done' => 'boolean', 'due_date' => 'date'];
}
