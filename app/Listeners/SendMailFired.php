<?php

namespace App\Listeners;
use App\User;
use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    /**
     * Create the event listener.
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        
        $user = User::find($event->userId);
        
        Mail::send('email.body', ['user'=>$user,'password'=>$event->password], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Users Credintials');
        });
    }
}
