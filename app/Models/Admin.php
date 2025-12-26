<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $casts = [
        'password' => 'hashed',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
