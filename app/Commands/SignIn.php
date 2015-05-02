<?php namespace App\Commands;

use Auth;
use Log;
use Request;

class SignIn extends Command {

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var boolean
     */
    public $remember;

    /**
     * Create the command.
     *
     * @param string $email
     * @param string $password
     * @param bool $remember
     */
    public function __construct($email, $password, $remember = false)
    {
        $this->email = $email;
        $this->password = $password;
        $this->remember = $remember;
    }

    /**
     * Handle the command.
     *
     * @return bool
     */
    public function handle()
    {
        $credentials = [
            'email'    => $this->email,
            'password' => $this->password,
            'valid'    => true,
        ];

        if (! Auth::attempt($credentials, $this->remember))
        {
            return false;
        }

        $user = Auth::user();

        if ($user)
        {
            $user->last_login = date('Y-m-d H:i:s');
            $user->last_known_ip = Request::ip();
            $user->save();
        }

        Log::info("User signed in", ['user' => $user]);

        return true;
    }

}
