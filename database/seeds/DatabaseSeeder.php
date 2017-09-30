<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i<50; $i++) {
            $createdTime = $faker->dateTimeThisYear;
            DB::table('posts')->insert([
                'title' => $faker->name,
                'text' => $faker->text(255),
                'created_at' => $createdTime,
                'updated_at' => $createdTime
            ]);
            $id = DB::getPdo()->lastInsertId();
            for ($j=0; $j<3; $j++) {
                $createdTime = $faker->dateTimeThisYear;
                DB::table('comments')->insert([
                    'email' => $faker->email,
                    'comment' => $faker->text(255),
                    'post_id' => $id,
                    'created_at' => $createdTime,
                    'updated_at' => $createdTime
                ]);
            }
        }
    }
}
