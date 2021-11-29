<?php

namespace Database\Seeders;

use App\Models\Antwoord;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AntwoordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vraagIdsList1 = [2,5,9,11];
        $vraagIdsList2 = [1,3,4,6,7,8,10];
        $faker = Faker::create();

        foreach ($vraagIdsList1 as $id){
            Antwoord::query()->insert([
                    'score' => $faker->numberBetween(1,10),
                    'vragenLijst_id' => 1,
                    'vraag_id' => $id,
                    'sessie_id' => 1

                ]
            );
        }

        foreach ($vraagIdsList1 as $id){
            Antwoord::query()->insert([
                    'score' => $faker->numberBetween(1,10),
                    'vragenLijst_id' => 1,
                    'vraag_id' => $id,
                    'sessie_id' => 2

                ]
            );
        }

        foreach ($vraagIdsList2 as $id){
            Antwoord::query()->insert([
                    'score' => $faker->numberBetween(1,10),
                    'vragenLijst_id' => 2,
                    'vraag_id' => $id,
                    'sessie_id' => 3

                ]
            );
        }

        foreach ($vraagIdsList2 as $id){
            Antwoord::query()->insert([
                    'score' => $faker->numberBetween(1,10),
                    'vragenLijst_id' => 2,
                    'vraag_id' => $id,
                    'sessie_id' => 4

                ]
            );
        }
    }
}
