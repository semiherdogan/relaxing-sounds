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
            'appuid' => 'abc123',
            'app_version' => '1.15',
            'app_language' => 'en',
            'language_version' => '1.12',
        ]);

        $user->generateApiToken();
    }
}
