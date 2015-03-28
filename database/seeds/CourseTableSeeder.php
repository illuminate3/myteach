<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        $book_ids = App\Book::lists('id');
        $years=['2017','2018','2015','2020','2019'];
        $semesters=['Fall','Spring'];
        Eloquent::unguard();
        foreach(range(1, 24) as $index)
        {
            \App\Course::create([
                'book_id' => $faker->randomElement($book_ids),
                'year'=> $faker->randomElement($years),
                'semester'=>$faker->randomElement($semesters),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}