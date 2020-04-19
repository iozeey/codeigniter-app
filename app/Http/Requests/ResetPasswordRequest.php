<?php

namespace App\Http\Requests;

use App\FanLib\MessageHandler;
use Illuminate\Support\Facades\Config;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ResetPasswordRequest extends FormRequest
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
            'code' => 'required|digits:5',
            'password' => 'required|min:1',
            'email' => 'required|email:unique'
        ];
    }


    /**
     * @param Validator $validator
     */
    protected function formatErrors(Validator $validator)
    {
        $messageHandler = new MessageHandler();

        $e = $messageHandler->error(Config::get('messages.default.errorKey'),null,$validator->getMessageBag(),null,true,true,true);

        return $validator->getMessageBag()->toArray();
    }


}
