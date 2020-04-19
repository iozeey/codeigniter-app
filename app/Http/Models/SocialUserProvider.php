<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SocialUserProvider extends Model
{
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User');
    }
    public function emails()
    {
        return $this->belongsTo('App\Http\Models\Email');
    }


    public function IsProviderUserIsExists($uid,$provider)
    {
        $emailRecord = $this->where('provider_uid', '=', strtolower(trim($uid)))->where('provider','=',$provider)->get();

        return is_null($emailRecord->first()) ? false : $emailRecord->first()->pluck('id');
    }
}
