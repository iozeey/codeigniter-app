<?php

namespace App\FanLib;


use App\Http\Models\Tag;

/*rename to registrationHelper*/

class Registration
{

    public function getNewAvailableTag()
    {
        $availableTag = null;
        $tagObj = new Tag();
        //$lastRecord = $tagObj->all()->last();//->pluck('fan_tag');
        $lastRecord = $tagObj->orderBy('created_at', 'desc')->first();

        if (is_null($lastRecord)) {
            $availableTag = 100000;
        } else {
            $availableTag = $lastRecord['fan_tag'];//$lastRecord->pluck('fan_tag');
        }

        return ++$availableTag;
    }

    function getNewRandomPW($length = 6)
    {
        $chars = 'bcdfghjklmnprstvwxzaeiou0123456789';
        $result = '';

        for ($p = 0; $p < $length; $p++)
        {
            $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
        }

        return $result;
    }

    function getRandomDigits($length = 4)
    {
        $result = '';
        $min = pow(10,$length);
        $max = pow(10,$length+1)-1;
        $result = rand($min, $max);
        return $result;
    }

    function postRegister($length = 6)
    {
        $chars = 'bcdfghjklmnprstvwxzaeiou0123456789';
        $result = '';

        for ($p = 0; $p < $length; $p++)
        {
            $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
        }

        return $result;
    }

}