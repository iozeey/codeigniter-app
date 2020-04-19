<?php

namespace App\FanLib;

use App\Http\Models\UsersSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Email extends Model
{
    /**
     * sending mail in background
     *
     * @param $template
     * @param $templateDate
     * @return Response
     */

    public function sendInQueue($template, $templateData)
    {
        Mail::queue($template, $templateData, function ($message) use ($templateData) {
            $message->to($templateData['to'], $templateData['name'])->subject($templateData['subject']);
            return true;
        });

        return false;
    }

    public function send($template, $templateData)
    {
        Mail::send($template, $templateData, function ($message) use ($templateData) {
            $message->to($templateData['to'], $templateData['name'])->subject($templateData['subject']);
            return true;
        });
        return false;
    }

    public function sendResetPasswordCodeToThis($email)
    {
        $user_setting = new UsersSetting();

        $code = $this->sendResetPasswordCodeToThisEmail($email); // sending email and returning code

        $user_setting->setUserCode($email,$code);

        Session::put(Config::get('appKeys.passwordResetEmail'), $email);

        return $email;
    }

    public function sendResetPasswordCodeToThisEmail($email,$code=null)
    {
        if(is_null($code)) {
            $register = new Registration();
            $code = $register->getRandomDigits();
        }

        if (!is_null($email)) {
            $this->send('emails.resetPassword',[
                'to'=>$email,
                'subject'=>'Reset 411fan password',
                'name'=>$email,
                'code'=> $code
            ]);
        }
        return $code;
    }


//how to send email
//$emailModel = new Email();//sending activation email
//
//
//$emailData = [
//'firstName' => $firstName,
//"to" => $user->email,
//"name" => $firstName,
//"subject" => 'Contest moved to your contest! hi richard this is incomplete.it just send email to last user',
//"contest_unique_id" => $contest['contest_unique_id']
//];
//
//$emailModel->sendInQueue('emails.myTemplate', $emailData);

}
