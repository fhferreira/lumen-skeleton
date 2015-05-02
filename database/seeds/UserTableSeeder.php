<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'name'     => 'Acme',
            'email'    => 'acme@example.com',
            'password' => 'Qwerty1!',
            'role'     => 'admin',
            'valid'    => true,
        ]);
    }

}
