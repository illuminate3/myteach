<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ExamStudentTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $student = App\Student::lists('id');
        $exam = App\Exam::lists('id');
        $grades = [10,5,100,20,20,12,10,20,15];
        Eloquent::unguard();
        foreach(range(1, 2) as $index)
        {
            \App\Exam_Student::create([
                'exam_id' => $faker->randomElement($exam),
                'student_id'=>$faker->randomElement($student),
                'grade'=>$faker->randomElement($grades),
                'present'=>1,
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}