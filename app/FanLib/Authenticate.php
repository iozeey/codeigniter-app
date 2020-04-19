<?php
namespace App\FanLib;

/**
 * Created by PhpStorm.
 * User: Zeeshan
 * Date: 7/7/2015
 * Time: 12:37 AM
 */
use App\FanLib\UserRepository;
use App\Http\Models\Email;
use App\Http\Models\SocialUserProvider;
use App\Http\Models\User;
use Illuminate\Contracts\Auth\Guard as Authenticator;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\FanLib\AuthenticateUsersListener;

class Authenticate
{

    private $users;
    private $socialite;
    private $auth;

    public function __construct(UserRepository $users, Socialite $socialite, Authenticator $auth)
    {
        $this->users = $users;
        $this->auth = $auth;
        $this->socialite = $socialite;
    }

    public function execute($hasCode, AuthenticateUsersListener $listener,$socialDriver,Request $request)
    {
        if (!$hasCode) return $this->getAuthorizationFirst($socialDriver);

        //https://laracasts.com/discuss/channels/laravel/how-to-solve-curl-error-60-ssl-certificate-in-laravel-5-while-facebook-authentication

        $userData = $this->getUser($socialDriver);

        $user = $this->users->findByUserNameOrCreate($userData, $socialDriver);

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user,$request);
    }

    public function getAuthorizationFirst($socialDriver)
    {
        return $this->socialite->driver($socialDriver)->redirect();
    }
    private function getUser($socialDriver)
    {
        return $this->socialite->driver($socialDriver)->user();
    }
}