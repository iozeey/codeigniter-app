<?php

namespace App\Http\Controllers\Auth;

use App\Events\PostRegisterEvent;
use App\FanLib\AuthenticateUsersListener;
use App\Http\BusinessLogicGateWays\AuthGateway;
use App\Http\Models\Email;
use App\Http\Models\Role;
use App\Http\Models\Tag;
use App\Http\Repositories\EmailRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Models\User;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;
use Validator;
use App\FanLib\Registration;
use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends BaseController implements AuthenticateUsersListener
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $username = 'id';//using this because making our authenticating system independent of username(tags.fan_tag) and also user can combine his/her multiple accounts in future
    protected $loginPath = 'sign-in';
    protected $redirectPath = '/fan-club';


    private $authGateWay ;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AuthGateWay $authGateWay)
    {
        parent::__construct();
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->authGateWay = $authGateWay;
    }


    public function getLogIn()
    {
        $register = new Registration();

        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        $fan_tag = $register->getNewAvailableTag();

        $pw = $register->getNewRandomPW();

        $signUpDisplay = null;
        $signInDisplay = 'signIn';

        return view('auth.authorizations', compact(['fan_tag', 'pw', 'signUpDisplay', 'signInDisplay']));
    }


    /**
     * 1)find out tag . if tag exist then get corresponding user id from tag_user table
     * for login attempt in users table with id and password
     * @param $data fan_tag and password
     */
    public function postLogin(Request $request)
    {
//        dd($request->all());
        $emailLibObj =  new \App\FanLib\Email();
        $tagsObj = new Tag();
        $emailObj = new \App\Http\Models\Email();
        $userObj = new User();

        if (!$this->formValidations->signIn($request)) // is not validated then redirect back with error messages
            return redirect()->back();

        $data = $this->getCredentials($request);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        //if this function is called by postRegister then it will always use tag to login
        $fan_tag_or_email = trim($data['fan_tag']);
//        $email = trim($data['email']);

        if (isValidEmail($fan_tag_or_email) === $fan_tag_or_email) {
            $tagsModel = $emailObj->with(['users'])->where('email','=', $fan_tag_or_email)->first();
        } else {
            $tagsModel = $tagsObj->with('users')->where('fan_tag', '=', $fan_tag_or_email)->first();
        }

        if (!is_null($tagsModel)) {
            // It exist

            if (isset($tagsModel['users']) && (count($tagsModel['users']) > 0)) {

                $credentials = ['id' => $tagsModel['users'][0]['id'], 'password' => $data['password']];

                $rememberMe = $request->has('remember');

                if(!empty($rememberMe))
                    $rememberMe = true;//will set cookies on user
                else
                    $rememberMe = false;

                if (Auth::attempt($credentials, $rememberMe)) {
                    return $this->handleUserWasAuthenticated($request, $throttles);
                }

                //send 5 digit code to email address
                //flush email id to session

                $emailLibObj->sendResetPasswordCodeToThis($userObj->getPrimaryEmail($fan_tag_or_email));

                $strErrorMsg = 'PW is not correct';
            }
            else
                $strErrorMsg = 'User is not exist associated with this tag #';

        } else {

            $strErrorMsg = 'User tag or email is not exist';
        }

        $this->messageHandler->error(null, null, null, $strErrorMsg, true, true);

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * provides two (_register and _signIn views) in one
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister()
    {
        $register = new Registration();

        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        $fan_tag = $register->getNewAvailableTag();

        $pw = $register->getNewRandomPW();

        $signUpDisplay = 'signUp';
        $signInDisplay = null;


        return view('auth.authorizations', compact(['fan_tag', 'pw', 'signUpDisplay', 'signInDisplay']));
    }

    public function postRegister(SignUpRequest $request)
    {
//        dd($request->all());
        /*
         * If fan_tag is available and email is unique then register
         * Insert into tags,emails,users,then update m:n relation for tags and email for users
         * */

        $this->authGateWay->registerUser($request);

//        $tagsObj = new Tag();
//        $userObj = new User();
//        $emailObj = new Email();
//        $rolesObj = new Role();

        try {
//            $tagModel = $tagsObj->store($request);
//            $userModel = $userObj->store($request);
//            $emailModel = $emailObj->store($request);
//            $roleModel = $rolesObj->saveAsFan($userModel['id']);
//            $userObj->attachTag($userModel, $tagModel);
//            $userObj->attachEmail($userModel, $emailModel);
           // $userObj->attachPrimaryEmail($userModel, $emailModel);
           // $userObj->attach($userModel,$roleModel);

            $this->messageHandler->success('postRegister', null, null, true, true, true);

            //now log in this newly created user
            $this->postLogin($request);

            $email = $request->get('email');

            if (isValidEmail($email) === $email) {
                Event::fire(new PostRegisterEvent($email));
            }

            if($request->ajax()) {
                return json_encode(['success'=>true,
                    'token' => "L",
                    'redirectToPath' => route('fan-club')
                ]);
            }

        } catch (Exception $ex) {
            dd($ex->getMessage());
        }

        return view('fanClub.index');
    }

    function getCredentials($request)
    {
        return $request->only('fan_tag', 'password');
    }

    /*start social auth*/
    /*Start Face book registration*/

    public function sAuth(\App\FanLib\Authenticate $au, Request $request, $sd)
    {
        try {
            $socialDrivers = Config::get('enum.socialDrivers');
            if (in_array($sd, $socialDrivers)) {
                //https://laracasts.com/discuss/channels/general-discussion/laravel-socialite-problem
                //My solution was revers i first changed mode chmode 777 -R storage then changed domain = null  from domain = "some url" in config/session.php
                if ($sd == Config::get('enum.socialDrivers.t'))
                    $str_code = 'oauth_token';
                else
                    $str_code = 'code';

                $response = $au->execute(\Input::has($str_code), $this, $sd, $request);
            } else {
                echo "Match not found";
                //todo : may be this is hacking attempt
            }

        } catch (ErrorException  $exc) {
            return redirect()->action('Auth\AuthController@getRegister');
        }

        return $response;
    }

    public function userHasLoggedIn($user, Request $request)
    {
        return redirect()->intended($this->redirectPath());
    }

    public function getResetPassword()
    {
        $signUpDisplay = null;
        $signInDisplay = null;
        $resetPasswordDisplay = Config::get('appKeys.passwordReset');

        $email = Session::get(Config::get('appKeys.passwordResetEmail'), 'null');

        $register = new Registration();

        $pw = $register->getNewRandomPW();

        return view('auth.authorizations', compact(['fan_tag','signUpDisplay', 'signInDisplay','resetPasswordDisplay','email','pw']));
    }

    /**
     * @param ResetPasswordRequest $request
     */
    public function postResetPassword(ResetPasswordRequest $request)
    {
        $email_from_client = $request->get('email');
        $code_from_client = $request->get('code');
        $pw = $request->get('password');

//        $emailLibObj = new Email();
        $user = new \App\Http\Models\User();
        $emailObj = new \App\Http\Models\Email();
        $user_setting = new \App\Http\Models\UsersSetting();

        $tagsModel = $emailObj->with(['users.userSetting'])->where('email', '=', $email_from_client)->first();

        if(strcmp($tagsModel['users'][0]['userSetting']['user_code'],$code_from_client)===0)
        {
            $uid = $tagsModel['users'][0]['id'];
            $user->updatePW($uid, $pw);
            $user_setting->clearUserCode($uid,$code_from_client);
            $this->messageHandler->success(Config::get('appKeys.passwordReset'),null,null,true,true,true);

            Session::forget(Config::get('appKeys.passwordResetEmail'));

            return redirect()->route('sign-in');
        }

        $this->messageHandler->error(Config::get('appKeys.passwordReset'),null,null,null,true,false,true);

        return redirect()->back();
    }
    /*end social auth*/
}
