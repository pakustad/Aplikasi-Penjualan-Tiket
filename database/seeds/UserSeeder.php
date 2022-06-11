<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "admin",
            'email' => "user@admin.com",
            "email_verified_at" => Carbon::now(),
            'password' => Hash::make("admin"),
        ]);
    }
}
