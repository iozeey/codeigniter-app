<?php

namespace App\Http\Models;

use App\Http\Models\User;
use App\Http\Requests\SignInRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Role extends Model
{

    protected $fillable = ['name', 'description'];

    /*Start Relations*/
    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User','role_user','role_id','user_id');
    }
    /*End Relations*/


}
