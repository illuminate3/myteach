<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LatestTableSeeder extends Seeder {




    public function run()
    {
        $faker = Faker::create();
        Eloquent::unguard();
        foreach(range(1, 24) as $index)
        {
            App\Latest_News::create([
                'title' => $faker->paragraph(1),
                'intro'=>$faker->paragraph(2),
                'description'=>$faker->paragraph(8),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'updated_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }

    }

}