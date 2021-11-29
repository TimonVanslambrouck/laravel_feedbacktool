<?php

namespace Database\Seeders;

use App\Models\Vraag;
use Illuminate\Database\Seeder;

class VraagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vraag::query()->insert([
                'beschrijving' => 'Over het elgemeen genomen vond ik het contact met mijn therapeut vandaag in orde.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Persoonlijk welbevinden'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'De manier van werken van mijn therapeut paste goed bij mij.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'We zijn het eens over wat voor mij belangrijk is om aan te werken.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Familie, intieme vrienden, vrienden'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Ik voel me gehoord begrepen en gerespecteerd.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'We hebben gewerkt of gepraat over dingen waaraan ik wilde werken of waarover ik wilde praten.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Ik voelde dat de dingen die ik in therapie doe, mij zullen helpen om de veranderingen die ik wil, te breiken.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Algemeen welbevinden'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Ik voel dat mijn therapeut om mij geeft, zelfs wanneer ik dingen doe die hij/zij niet goedkeurt.'
            ]
        );

        Vraag::query()->insert([
                'beschrijving' => 'Werk, opleiding, sociale contacten'
            ]
        );
    }
}
