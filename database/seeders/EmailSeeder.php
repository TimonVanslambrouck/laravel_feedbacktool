<?php

namespace Database\Seeders;

use App\Models\AllowedEmail;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
       AllowedEmail::query()->insert([
                'email' => $faker->email,
            ]
        );
    }
}
