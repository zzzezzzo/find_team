<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\softDeletes;

class Teams extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'user_id'
    ];
}
