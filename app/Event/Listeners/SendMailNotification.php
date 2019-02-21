<?php

namespace App\Event\Listeners;

use App\Event\UserAccountCreated;
use App\Mail\AccountRegistrationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNotification implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  UserAccountCreated  $event
     * @return void
     */
    public function handle(UserAccountCreated $event)
    {
        $user = $event->user;
        Mail::to($user)->send(new AccountRegistrationMail($user));
    }
}
