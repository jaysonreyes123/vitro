<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hr extends Authenticatable
{

    use HasFactory;
    protected $table = "hr";

    protected $fillabe = [
        'firstname',
        'lastname',
        'username',
        'password'
    ];

    protected $hidden = [
        'password'
    ];
}
