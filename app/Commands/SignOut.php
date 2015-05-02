<?php namespace App\Commands;

use Auth;

class SignOut extends Command {

    /**
     * Execute the command.
     *
     * @return bool
     */
    public function handle()
    {
        if (! Auth::check())
        {
            return false;
        }

        Auth::logout();

        return true;
    }

}
