<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    //
    protected $fillable = ['course_id','class_date','file_name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $model->uploaded_by =  Auth::guard('superadmin')->user()->id;
        });
    }

}
