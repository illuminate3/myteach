<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $course_ids = App\Course::lists('id');
        $high_scores = [10,20,100,5,12];
        Eloquent::unguard();
        foreach(range(1, 80) as $index)
        {
            \App\Exam::create([
                'course_id' => $faker->randomElement($course_ids),
                'title'=>$faker->paragraph(1),
                'date'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'high_score' => $faker->randomElement($high_scores),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}