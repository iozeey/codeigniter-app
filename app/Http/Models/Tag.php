<?php

namespace App\Http\Models;
use App\Http\Requests\SignInRequest;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $fillable = ['fan_tag'];
    /*Start Relations*/
    public function users()
    {
        return $this->belongsToMany('App\Http\Models\User','tag_user','tag_id','user_id');
    }
    /*End Relations*/

}
