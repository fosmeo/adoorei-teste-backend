<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userSeeder();
    }

    private function userSeeder(){

        for ($i=1; $i <= 3; $i++) {
            User::create([
                'name'=> 'User - '.$i,
                'email'=> 'user'.$i.'@email.com',
                'password'=> '12345',
            ]);
        }
    }
        
}
