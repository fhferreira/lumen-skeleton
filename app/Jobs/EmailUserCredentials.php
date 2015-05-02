<?php namespace App\Jobs;

use App\Events\UserCreated;
use Mail;

class EmailUserCredentials extends Job {

    /**
     * Handle the event.
     *
     * @param  UserCreated $event
     * @return bool
     */
    public function handle(UserCreated $event)
    {
        $user = $event->user;

        $homepage = route('home');

        Mail::send(['text' => 'emails.credentials'], compact('user', 'homepage'), function ($message) use ($user)
        {
            $message->to($user->email);
            $message->subject('[Acme] Your account credentials');
        });

        return true;
    }

}
