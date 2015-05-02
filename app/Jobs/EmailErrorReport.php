<?php namespace App\Jobs;

use App\Events\ErrorOccurred;
use Mail;

class EmailErrorReport extends Job {

    /**
     * Handle the event.
     *
     * @param  ErrorOccurred $event
     * @return bool
     */
    public function handle(ErrorOccurred $event)
    {
        $env = ucfirst(app()->environment());

        Mail::raw($event->exception, function ($message) use ($env)
        {
            $message->to(config('mail.report'));
            $message->subject("[Acme] {$env} Error Report");
        });

        return true;
    }

}
