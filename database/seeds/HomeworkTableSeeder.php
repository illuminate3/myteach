<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class HomeworkTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $course_ids = App\Course::lists('id');
        Eloquent::unguard();
        foreach(range(1, 80) as $index)
        {
            \App\Homework::create([
                'course_id' => $faker->randomElement($course_ids),
                'title'=>$faker->paragraph(1),
                'description'=>$faker->paragraph(4),
                'file'=>'homeworks/ketab.pdf',
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}