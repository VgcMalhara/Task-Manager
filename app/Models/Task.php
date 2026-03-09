<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes; // Trait eka use karanna

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];
}
