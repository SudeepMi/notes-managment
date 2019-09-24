<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
   protected $fillable = ['name','email','password','phone','address','status'];

   protected $hidden = ['password'];

   protected $table = 'students';

}
