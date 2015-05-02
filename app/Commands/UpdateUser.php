<?php namespace App\Commands;

use App\Models\User;
use Log;

class UpdateUser extends Command {

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $role;

    /**
     * @var bool
     */
    public $valid;

    /**
     * Create a new command instance.
     *
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $role
     * @param bool $valid
     */
    public function __construct($id, $name, $email, $role, $valid = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->valid = $valid;
    }

    /**
     * Handle the command.
     *
     * @return bool|User
     */
    public function handle()
    {
        if (! $user = User::find($this->id))
        {
            return false;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->valid = $this->valid;
        $user->role = $this->role;

        if (! $user->save())
        {
            return false;
        }

        Log::info("User updated", ['user' => $user]);

        return $user;
    }

}
