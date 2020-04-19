<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UsersSetting extends Model
{
    protected $guarded = ['id'];

    protected $table = 'users_settings';

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id', 'id');
    }

    public function clearUserCode($uid,$code_from_client)
    {
        return $this->where('user_code','=',$code_from_client)->where('user_id', $uid)->update(['user_code'=> '']);
    }

    public function setUserCode($email,$code)
    {
        $user = new User();
        $emailModelObj = new \App\Http\Models\Email();

        $tagsModel = $emailModelObj->with(['users'])->where('email', '=', $email)->first();
        $user->id = $tagsModel['users'][0]['id'];
        $attributes =  $this->firstOrCreate(['user_id'=>$tagsModel['users'][0]['id']]);

        $attributes['user_code'] = $code;
        $user->userSetting()->save($attributes);

        return $email;
    }
}
