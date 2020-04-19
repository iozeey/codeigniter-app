<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;


class Email extends BaseModel
{
    protected $fillable = ['email'];

    /*Start Relations*/
    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User', 'email_user', 'email_id', 'user_id');
    }

    public function socialProviders()
    {
        return $this->hasMany('App\Http\Models\SocialUserProvider');
    }
    /*End Relations*/


}
