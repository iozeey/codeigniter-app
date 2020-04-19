<?php
/**
 * Created by PhpStorm.
 * User: Zeeshan
 * Date: 7/7/2015
 * Time: 1:09 AM
 */

namespace App\FanLib;

use App\Http\Models\Email;

use App\Http\Models\Role;
use App\Http\Models\SocialUserProvider;
use App\Http\Models\Tag;
use App\Http\Models\User;
use App\Http\Models\UsersSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Foundation\Auth\ResetsPasswords;


class UserRepository
{
    /**
     * Used with signUp and SignIn for facebook
     * @param $userData
     * @return \Illuminate\View\View|static
     */
    use ResetsPasswords;

    public function findByUserNameOrCreate($userData, $socialDriver)
    {
        try {
            $photo = $userData->getAvatar();
            $name = $userData->getName();
            $nickName = $userData->getNickname();
            $provider_uid = $userData->getId();
            $data = $userData->user;
            $pwdModelObj = new \App\Http\Models\PasswordReset();
            $email = trim($userData->getEmail());
            $password = $pwdModelObj->getRandomPassword();
            $passwordToBeSaveInDB = bcrypt($password);


            $isAlreadyEmailExist = false;
            $isAlreadyUserIdExist = false;


            $userAttributes = [
                'username' => '',
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'photo_path' => '',
            ];
            $dataForEmail = array(
                'first_name' => '',
                "last_name" => '',
                "password" => '',
                "to" => '',
                "name" => '',
                "subject" => 'Thanks for joining Trivia Hedge !'
            );
            if ($socialDriver == 'google') {
                $userAttributes = [
                    'username' => $name,
                    'first_name' => isset($userData->user['name']['givenName']) ? $userData->user['name']['givenName'] : 'empty',
                    'last_name' => isset($userData->user['name']['familyName']) ? $userData->user['name']['familyName'] : 'empty',
                    'email' => $email,
                    'photo_path' => $photo,
                ];
                $dataForEmail = array(
                    'first_name' => isset($userData->user['name']['givenName']) ? $userData->user['name']['givenName'] : 'empty',
                    'last_name' => isset($userData->user['name']['familyName']) ? $userData->user['name']['familyName'] : 'empty',
                    "password" => $password,
                    "to" => $email,
                    "name" => isset($userData->user['name']['familyName']) ? $userData->user['name']['familyName'] : 'empty' . ' ' . isset($userData->user['name']['givenName']) ? $userData->user['name']['givenName'] : 'empty',
                    "subject" => 'Thanks for joining Trivia Hedge !'
                );
            } else if ($socialDriver == 'facebook') {
                $userAttributes = [
                    'username' => $name,
                    'first_name' => isset($data['first_name']) ? $data['first_name'] : null,
                    'last_name' => isset($data['last_name']) ? $data['last_name'] : null,
                    'gender' => isset($data['gender']) ? $data['gender'] : null,
                    'email' => $email,
                    'photo_path' => $photo,
                    'status' => isset($data['verified']) ? $data['verified'] : 0,
                ];
                $dataForEmail = array(
                    'first_name' => isset($data['first_name']) ? $data['first_name'] : 'empty',
                    "last_name" => isset($data['last_name']) ? $data['last_name'] : 'empty',
                    "password" => $password,
                    "to" => $email,
                    "name" => $data['last_name'] . ' ' . $data['first_name'],
                    "subject" => 'Thanks for joining Trivia Hedge !'
                );
            } else if ($socialDriver == 'twitter') {
                $userAttributes = [
                    'username' => $nickName,
                    'first_name' => isset($name) ? $name : 'none',
                    'last_name' => isset($name) ? $name : 'none',
                    'gender' => null,
                    'email' => $email,
                    'photo_path' => $photo,
                    'status' => isset($data['verified']) ? $data['verified'] : 0,
                ];
            }

            /*social provider info*/
            $socialProvider = [
                'email_id' => '',
                'user_id' => '',
                'provider' => $socialDriver,
                'provider_uid' => $provider_uid,
            ];
            /*
            * 1) check if email already exist
            *      ->just login then redirect to intended location
            * 2) else user account creation process
            *      -> show model for getting tag with auto assigned tag todo
            *      -> create email
            *      -> after creation tag, email then create user and then relate email and tags with user
            * */

            $userObj = new User();
            $emailObj = new Email();
            $tagObj = new Tag();
            $sup = new SocialUserProvider();
            if(isset($email) && $email != "" && !is_null($email))
                $isAlreadyEmailExist = $emailObj->IsEmailExistInUsers($email);//return email id if exists else false

            if(isset($provider_uid) && $provider_uid != "" && !is_null($provider_uid))
            {
                $isAlreadyUserIdExist = $sup->IsProviderUserIsExists($provider_uid,$socialDriver);//return email id if exists else false
            }

            if ($isAlreadyEmailExist != false) //id email exist then id will here  else false
            {
                /*if exist then returns id else false*/
                /*just login and redirect to intended location*/

                $user = DB::table('users')
                    ->join('email_user', 'email_user.user_id', '=', 'users.id')
                    ->join('emails', 'email_user.email_id', '=', 'emails.id')
                    ->where('emails.email', '=', $email)->first();

              //  $u = $user;

                $user = User::find($user->id);

                if (!$isAlreadyUserIdExist)
                {
                    $socialProviderModel = $sup->firstOrCreate($socialProvider);

                    $user->save();
                }

                return $user;

            } else if ($isAlreadyUserIdExist != false) {
                /*if exist then returns id else false*/
                /*just login and redirect to intended location*/

                $user = DB::table('users')
                    ->join('social_user_providers', 'social_user_providers.user_id', '=', 'users.id')
                    ->select('users.id')
                    ->where('social_user_providers.provider_uid', '=', $provider_uid)
                    ->where('social_user_providers.provider', '=', $socialDriver)
                    ->first();


                $userObj =  User::find($user->id);

                return  $userObj;
            }
            else
            {
                $rolesObj = new Role();
                $register = new Registration();

                $fan_tag = $register->getNewAvailableTag();//generate auto assigned tag

                $user = $userObj->create($userAttributes);
              //  $user->save();

                $tagModel = $tagObj->firstOrCreate(['fan_tag' => $fan_tag]);

                $user->tags()->save($tagModel);

                $roleModel = $rolesObj->saveAsFan($user->id);

              //  $user->roles()->save($roleModel);

                if (!is_null($email) && $email != "") {

                    $email = $emailObj->firstOrCreate(['email' => $email]);

                    $user->emails()->save($email);

                    $socialProvider['email_id'] = $email->id;//it was creating problem ( $user->socialProviders()->save($email))so i do this solution for the time
                }

                $socialProviderModel = $sup->firstOrCreate($socialProvider);

                $user->socialProviders()->save($socialProviderModel);

                $user->push();

                return $user;
            }

        }
        catch (Exception $ex)
        {
            echo "Error";
        }
    }
}