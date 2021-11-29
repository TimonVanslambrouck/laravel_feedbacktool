<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Sessie;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patientIDs = Patient::query()->pluck('id');
        // https://laracasts.com/discuss/channels/laravel/seeding-with-foreign-keys
        // https://stackoverflow.com/a/41808087
        $faker = Faker::create();
        for ($x = 1; $x <= 4; $x++){
            Sessie::query()->insert([
                    'nummer' => $x,
                    'datum' => Carbon::create('2020','05',$x),
                    'patient_id' => $faker->randomElement($patientIDs)
                ]
            );
        }

    }
}
