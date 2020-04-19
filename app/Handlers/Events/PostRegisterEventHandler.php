<?php

namespace App\Handlers\Events;

use App\Events\PostRegisterEvent;
use App\FanLib\Email;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostRegisterEventHandler
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostRegisterEvent $event
     * @return void
     */
    public function handle(PostRegisterEvent $event)
    {
        $emailModel = new Email();//sending activation email

        $emailData = [
            "name" => $event->param,
            "to" => $event->param,
            "subject" => 'Welcome to 411fan community'
        ];

        $emailModel->send('emails.welcome', $emailData);

    }
}
