<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Admin extends Authenticatable
{
    use Sluggable;

    protected $fillable = ['name','email','password','phone','status'];

    protected $hidden = ['password'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


}
