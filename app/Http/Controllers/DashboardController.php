<?php

namespace App\Http\Controllers;

use App\Models\Antwoord;
use App\Models\Patient;
use App\Models\Sessie;
use App\Models\Vragenlijst;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function show ()
    {

        $patients = Patient::query()->where('therapeut_id', '=', Auth::id())->orderBy('initialen')->get();

        return view('dashboard', ['patients' => $patients]);
    }

    function showPatient ($patient_id)
    {

        $patient = Patient::query()->where('id', '=', $patient_id)->get();

        $sessions = Sessie::query()->where('patient_id', '=', $patient[0]->id)->get();

        $questionnaire = Vragenlijst::all();

        $list1Names = [];
        $list2Names = [];
        $list1Data = [];
        $list2Data = [];

        foreach ($sessions as $session){
            $answers = Antwoord::query()->where('sessie_id', '=', $session->id)->get();
            $sum = 0;
            $count = 0;
            foreach ($answers as $answer){
                $sum += $answer->score;
                $count += 1;
            }
                if ($answers[0]->vragenLijst_id == 1){
                        array_push($list1Names, 'Session '.$session->nummer.'<br>'.$session->datum);
                        array_push($list1Data, round($sum/$count, 2));
                } elseif ($answers[0]->vragenLijst_id == 2) {
                        array_push($list2Names, 'Session '.$session->nummer.'<br>'.$session->datum);
                        array_push($list2Data, round($sum/$count, 2));
                }
        }
        $data = [$questionnaire,$list1Names, $list1Data, $list2Names, $list2Data];
        return view('dashboard', ['specificPatient' => $patient[0], 'data' => $data]);
    }
}
