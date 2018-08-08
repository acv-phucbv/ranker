<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userDatas = [
            ['username' => 'admin', 'email' => 'phucbv2101@gmail.com', 'password' => bcrypt('123456'), 'role' => 1],
            ['username' => 'phucbv', 'email' => 'phucduong9x@gmail.com', 'password' => bcrypt('123456'), 'role' => 2]
        ];
        DB::transaction(function () use ($userDatas) {
            \DB::table('users')->truncate();
            \DB::table('profiles')->truncate();
            foreach ($userDatas as $userData) {
                $user = \App\Models\User::create($userData);
                $profile = ['user_id' => $user->id];
                \App\Models\Profile::create($profile);
            }
        });
    }
}
