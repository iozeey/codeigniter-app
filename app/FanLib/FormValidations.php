<?php

namespace App\FanLib;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormValidations
{
    public function __construct()
    {
        $this->messageHandler = new MessageHandler();
    }


    public function signIn(Request $request)
    {
        $data = $request->only('_token', 'fan_tag', 'password');

        $validation = Validator::make($data, [
            'fan_tag' => 'required|max:255',
            'password' => 'required|min:1'
        ]);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors,null,true,true));

            return false;
        }

        return true;
    }


    public function adminAddPrize(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'value' => 'required', // just a normal required validation
            'description' => 'required',
            'status' => 'required',
        ];

        $data = $request->only('_token', 'name', 'value', 'description', 'status');

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors));

            return false;
        }

        return true;
    }

    public function adminAddUser(Request $request)
    {


        $rules = [
            'fn' => 'required|min:3',
            'ln' => 'required|min:3', // just a normal required validation
            'email' => 'required',
            'phone' => 'required',
        ];

        $data = $request->only('_token', 'fn', 'ln', 'email', 'phone');

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors));

            return false;
        }

        return true;
    }


    public function adminAddContest(Request $request)
    {

        $rules = [
            'contest_category_id' => 'required',
            'prize_category' => 'required',
            //    'prize_id' => 'required',
            'round1Question' => 'required',
            'round2Question' => 'required',
            'round3Question' => 'required',
            // "contest_status" =>'required',
            'lifetime' => 'required',
            'elimination_fee' => 'required',
            'status' => 'required',
            'contestant_limit' => 'required',
            'question_distribution_time' => 'required',
            'answer_given_time' => 'required',
            'prize_list' => 'required'
        ];

        $data = $request->only(
            '_token', 'contest_category_id', 'prize_category',
            //'prize_id',
            'round1Question', 'round2Question', 'round3Question',
            "contest_status", 'lifetime', 'elimination_fee', 'status', 'contestant_limit', 'question_distribution_time',
            'answer_given_time'
            , 'prize_list'
        );

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors));

            return false;
        }

        return true;
    }


    public function loginValidation(Request $request)
    {


        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $data = $request->only(
            '_token', 'email', 'password'
        );

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors));

            return false;
        }

        return true;
    }


    public function updateAdminProfile(Request $request)
    {


        $rules = [
            "fn" => "required",
            "ln" => "required",
            'email' => 'required',
            "phone" => "required",
            "address" => "required",
            "apartment_suite" => "required",
            "city" => "required",
            "state" => "required",
            "zip" => "required"
        ];

        $data = $request->only('_token', "fn", "ln", 'email', "phone", "address", "apartment_suite", "city", "state", "zip");

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {

            $errors = $validation->messages();

            $key = 'validation';//Config::get('messages.flash_messages_success.passwordReset');
            \Session::flash($key, $this->messageHandler->error($key, null, $errors));

            return false;
        }

        return true;
    }

}