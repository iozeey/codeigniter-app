<?php
namespace App\FanLib;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Facades\Config;

class MessageHandler
{
    /*
     * Improvement
     * you can also flash message in these function instead of in views
     * */
    public function success($key=null, $style = null, MessageBag $systemErrors = null, $xBtn = false, $autoHide = false,$isFlashHere = false)
    {

        if(is_null($key))
        {
            $key = Config::get('messages.default.successKey');
            $isFlashHere = true;
        }

        $message = '<div class="alert alert-success">';
        if ($xBtn)
            $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        $message .= '<strong>' . Config::get('messages.success.' . $key . '.title') . '</strong>';

        $message .= Config::get('messages.success.' . $key . '.message');

        $message .= $this->getListFromSystemErrorArray($systemErrors);

        $message .= ' </div>';

        if ($autoHide)
            $message .= '<script>
                            window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                            });
                            }, 5000);
                         </script>';

        if($isFlashHere) {
            \Session::flash($key, $message);
        }

        return $message;
    }

    public function error($key=null, $style = null, MessageBag $systemErrors = null, $customErrors = null, $xBtn = false, $autoHide = false,$isFlashHere = false)
    {
        if(is_null($key))
        {
            $key = Config::get('messages.default.errorKey');
            $isFlashHere = true;
        }

        $message = '<div class="alert alert-danger">';

        if ($xBtn)
            $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        $message .= '<strong>' . Config::get('messages.error.' . $key . '.title') . '</strong>';

        $message .= Config::get('messages.error.' . $key . '.message');

        $message .= $this->getListFromSystemErrorArray($systemErrors);

        $message .= $this->getListFromCustomErrorArray($customErrors);

        $message .= ' </div>';

        if ($autoHide)
            $message .= '<script>
                            window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                            });
                            }, 2000);
                         </script>';

        if($isFlashHere)
        {
            \Session::flash($key, $message);
        }

        return $message;
    }


    public function warning($key, $style = null, MessageBag $systemErrors = null, $customErrors = null, $xBtn = false, $autoHide = false)
    {

        $message = '<div class="alert alert-warning">';

        if ($xBtn)
            $message .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        $message .= '<strong>' . Config::get('messages.warning.' . $key . '.title') . '</strong>';

        $message .= Config::get('messages.warning.' . $key . '.message');

        $message .= $this->getListFromSystemErrorArray($systemErrors);

        $message .= $this->getListFromCustomErrorArray($customErrors);

        $message .= ' </div>';

        if ($autoHide)
            $message .= '<script>
                            window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                            });
                            }, 2000);
                         </script>';

        return $message;
    }

    private function getListFromCustomErrorArray($customErrors = null)
    {
        $list = '';


        if ($customErrors) {
            if(is_array($customErrors))
            {
                foreach ($customErrors as $key => $value) {
                    $list .= '<li>' . $value . '</li>';
                }
            }
            else
                $list .= '<li>' . $customErrors . '</li>';

        }
        return $list;
    }

    private function getListFromSystemErrorArray(MessageBag $systemErrors = null)
    {
        $list = '';

        if ($systemErrors) {
            foreach ($systemErrors->all() as $key => $value) {
                $list .= '<li>' . $value . '</li>';
            }
        }
        return $list;
    }
}