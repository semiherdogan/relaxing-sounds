<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Semih ERDOĞAN',
            'email' => 'hasansemiherdogan@gmail.com',
            'password' => bcrypt('test123*')
        ]);

        $user->generateApiToken();
    }
}
