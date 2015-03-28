<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $course_ids = App\Course::lists('id');
        Eloquent::unguard();
        foreach(range(1, 280) as $index)
        {
            \App\Student::create([
                'course_id' => $faker->randomElement($course_ids),
                'name'=>$faker->firstName,
                'family'=>$faker->lastName,
                'email'=>$index . $faker->email,
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}