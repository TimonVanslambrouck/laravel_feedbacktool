<?php

namespace Database\Seeders;

use App\Models\Vragenlijst;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VragenlijstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vragenlijst::query()->insert([
                'puntenschaal' => 10,
                'naam' => 'ORS',
                'volledigeNaam' => 'Outcome Rating Scale: Hoe gaat het met u?',
                'hoofdVraag' => 'Hoe is het met u gegaan de afgelopen week, of sinds het laatste contact met de therapeut, inclusief vandaag?',
                'descriptie' => 'Duid aan op een schaal van 1 tot 10: met 1 is laag en 10 is hoog.',
                'vraag_ids' => "2 5 9 11"
            ]
        );

        Vragenlijst::query()->insert([
                'puntenschaal' => 10,
                'naam' => 'SRS',
                'volledigeNaam' => 'Session Rating Scale: Hoe vond u de sessie?',
                'hoofdVraag' => 'Hoe vond u de sessie?',
                'descriptie' => 'Duid aan op een schaal van 1 tot 10 hoe de beschrijving past bij uw gevoel:1 geeft aan dat u het helemaal niet eens bent met de stelling,10 geeft aan dut u het helemaal eens bent met de stelling..',
                'vraag_ids' => "1 3 4 6 7 8 10"
            ]
        );
    }
}
