<?php
/**
 * Created by PhpStorm.
 * User: Zeeshan
 * Date: 7/8/2015
 * Time: 1:10 AM
 */
namespace App\FanLib;

use Illuminate\Http\Request;

interface AuthenticateUsersListener
{
    public function userHasLoggedIn($user,Request $request);
}