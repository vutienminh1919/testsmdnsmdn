<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'minh';
        $user->email = 'minh@gmail.com';
        $user->password = Hash::make('2491996');
        $user->save();

        $user = new User();
        $user->name = 'minh1';
        $user->email = 'minh1@gmail.com';
        $user->password = Hash::make('2491996');
        $user->save();

        $user = new User();
        $user->name = 'minh2';
        $user->email = 'minh2@gmail.com';
        $user->password = Hash::make('2491996');
        $user->save();

        $user = new User();
        $user->name = 'minh3';
        $user->email = 'minh4@gmail.com';
        $user->password = Hash::make('2491996');
        $user->save();
    }

}
