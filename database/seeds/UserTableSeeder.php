<?php

use App\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'kennethirungu1800@gmail.com')->first();

        if (!$user) {
          User::create([
            'role' => 'admin',
            'name' => 'Kenny',
            'email' => 'kennethirungu1800@gmail.com',
            'password' => Hash::make('password')
          ]);
        }
    }

}
