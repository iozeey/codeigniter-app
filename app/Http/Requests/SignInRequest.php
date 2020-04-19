<?php

namespace App\Http\Requests;

use App\FanLib\MessageHandler;
use Illuminate\Support\Facades\Config;
use  Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class SignInRequest extends FormRequest
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
            'fan_tag' => 'required|max:255',
            'password' => 'required|min:1'
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
