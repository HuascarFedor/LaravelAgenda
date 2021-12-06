<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Huascar Gonzales',
            'email' => 'huascar.fedor@gmail.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');
        
        \App\Models\User::factory(5)->create();
    }
}
