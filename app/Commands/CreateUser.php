<?php namespace App\Commands;

use App\Events\UserCreated;
use App\Models\User;
use Log;

class CreateUser extends Command {

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
     * @param string $name
     * @param string $email
     * @param string $role
     * @param bool $valid
     */
    public function __construct($name, $email, $role, $valid = true)
    {
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
        $password = str_random(9).'!';

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $password,
            'role'     => $this->role,
            'valid'    => $this->valid,
        ]);

        if (! $user->id)
        {
            return false;
        }

        event(new UserCreated($user, $password));

        Log::info("User created", ['user' => $user]);

        return $user;
    }

}
