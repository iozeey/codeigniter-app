<?php

namespace App\Http\Requests;

use App\FanLib\MessageHandler;
use Illuminate\Support\Facades\Config;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class SignUpRequest extends  FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fan_tag' => 'required|max:255|unique:tags',
            'password' => 'required|min:1',
            'email' => 'required|email|unique:emails',
        ];
    }

    /**
     * @param Validator $validator
     */
    protected function formatErrors(Validator $validator)
    {
        $messageHandler = new MessageHandler();
        $messageBag = $validator->getMessageBag();

        $messages = $validator->errors();

        if ($messages->has('email')) {
            $emailObj =new \App\FanLib\Email();
            $isValidEmail = isValidEmail($this->get('email'));

            if($isValidEmail === $this->get('email'))
            {
                $emailObj->sendResetPasswordCodeToThis($isValidEmail);
            }
        }

        $e = $messageHandler->error(Config::get('messages.default.errorKey'),null,$messageBag,null,true,true,true);

        return $validator->getMessageBag()->toArray();
    }


    public function messages()
    {
        return [
            'email.required' => 'Er, you forgot your email address!',
            'email.unique' => 'The email has already been taken.If this belongs to you then
                We sent a code that allow you to enter a new password and <a href='.route('reset-password').' class=reset-password-link>gain entry</a>',

        ];
    }
}
