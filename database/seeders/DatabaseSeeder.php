<?php

namespace Database\Seeders;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::create([
        //     'name' => 'Administrator',
        //     'username' => 'admin',
        //     'email' => 'admin@yahoo.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        //     'avatar' => '/storage/user/default.png',
        //     'phone' => '083857317946',
        // ]);

        // $this->call(CategorySeeder::class);
        Mitra::factory(10)->create();
    }
}
