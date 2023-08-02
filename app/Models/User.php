<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'password', 'verification_code'];
    protected $attributes = [
        'verification_code' => '0'
    ];
}
