<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PatientenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $therapeutenIDs = User::query()->pluck('id');
        // https://laracasts.com/discuss/channels/laravel/seeding-with-foreign-keys
        // https://stackoverflow.com/a/41808087
        $faker = Faker::create();
        Patient::query()->insert([
                'initialen' => Str::random(2),
                'therapeut_id' => $faker->randomElement($therapeutenIDs),
                'created_at' => $faker->date('Y-m-d', 'now'),
                'updated_at' => Carbon::create('2020','05','04','09', '02','26')
            ]
        );
    }
}
