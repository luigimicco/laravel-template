<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $user = new User();
        $user->name = 'User';
        $user->surname = 'Admin';
        $user->email = 'admin@appname.com';
        $user->password = Hash::make('password');
        $user->level = 'admin';
        $user->active = true;
        $user->note = "";
        $user->save();

        $user = new User();
        $user->name = 'User';
        $user->surname = 'Manager';
        $user->email = 'manager@appname.com';
        $user->password = Hash::make('password');
        $user->level = 'manager';
        $user->active = true;
        $user->note = "";
        $user->save();

        $user = new User();
        $user->name = 'User';
        $user->surname = 'User';
        $user->email = 'user@appname.com';
        $user->password = Hash::make('password');
        $user->level = 'user';
        $user->active = true;
        $user->note = "";
        $user->save();
    }
}
