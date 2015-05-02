<?php namespace App\Events;

use App\Models\User;

class UserCreated {

    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $password;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param string $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

}
