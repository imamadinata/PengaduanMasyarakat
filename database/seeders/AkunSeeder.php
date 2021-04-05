<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'imam',
                'email' => 'adinata.imam@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 'admin',
            ],
            [
                'name' => 'adinata',
                'email' => 'imam@adinata.com',
                'password' => bcrypt('123456'),
                'level' => 'petugas',
            ],
            [
                'name' => 'abu raiysa',
                'email' => 'aburaisya@adinata.com',
                'password' => bcrypt('123456'),
                'level' => 'masyarakat',
            ],
        ];
        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
