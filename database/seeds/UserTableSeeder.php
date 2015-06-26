<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {




    public function run()
    {
       // $faker = Faker::create();

            \App\User::create([
                'name'=>'Ali Mohamadzade',
                'password'=>\Hash::make('654321'),
                'email'=>'admin@admin.com',
                'role'=>'1'
            ]);

    }

}