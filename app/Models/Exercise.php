<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'profile'];
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'profile' => 'required',
    );
}
