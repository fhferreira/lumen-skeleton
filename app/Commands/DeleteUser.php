<?php namespace App\Commands;

use App\Models\User;
use Log;

class DeleteUser extends Command {

    /**
     * @var integer
     */
    public $id;

    /**
     * Create a new command instance.
     *
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Handle the command.
     *
     * @return bool
     */
    public function handle()
    {
        if (! $user = User::find($this->id))
        {
            return false;
        }

        if (! $user->delete())
        {
            return false;
        }

        Log::info("User deleted", ['user' => $user]);

        return true;
    }

}
