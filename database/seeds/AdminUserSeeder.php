<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'jhon',
            'email' => 'jhon@example.com',
            'password' => '$2y$10$Gkoho102gT2niXU2EQhUNuMJ7LYC81WSS/TZzs0T6/VxoXxAiS7le',
        ]);
    }
}
