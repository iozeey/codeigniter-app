<?php

namespace App\Http\Models;

use Illuminate\Auth\Authenticatable;
use App\Http\Requests\SignInRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['first_name', 'last_name', 'gender','photo_path', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /*Start Relations*/
    public function roles()
    {
        return $this->belongsToMany('App\Http\Models\Role','role_user','user_id','role_id');
    }

    public function emails()
    {
        return $this->belongsToMany('App\Http\Models\Email','email_user','user_id','email_id');
    }

    public function primaryEmail()
    {
        return $this->belongsToMany('App\Http\Models\Email','email_user','user_id','primary_email_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Http\Models\Tag','tag_user','user_id','tag_id');
    }

    public function socialProviders()
    {
        return $this->hasMany('App\Http\Models\SocialUserProvider');
    }

    public function userSetting()
    {
        return $this->hasOne('App\Http\Models\UsersSetting', 'user_id', 'id');
    }
    /*End Relations*/
}
