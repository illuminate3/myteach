<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        //$course_ids = App\Contact::lists('id');
        Eloquent::unguard();
        foreach(range(1, 5) as $index)
        {
            \App\Contact::create([
                'name'=>$faker->firstName,
                'email'=>$index . $faker->email,
                'subject'=>$faker->paragraph('1'),
                'message'=>$faker->paragraph('4'),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}