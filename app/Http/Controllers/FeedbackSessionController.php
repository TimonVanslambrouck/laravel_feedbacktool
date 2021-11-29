<?php

namespace App\Http\Controllers;

use App\Models\AllowedQuery;
use App\Models\Patient;
use App\Models\Sessie;
use App\Models\Vragenlijst;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class FeedbackSessionController extends Controller
{
    function show ()
    {
        $patients = Patient::query()->where('therapeut_id', '=', Auth::id())->get();
        $questionLists = Vragenlijst::all();
        return view('feedback-session', ['patients' => $patients, 'questionLists' => $questionLists]);
    }

    function store ()
    {
        $patients = Patient::query()->where('therapeut_id', '=', Auth::id() )->get();
        $questionLists = Vragenlijst::all();
        $patient_id = $_POST['patient'];
        $session = $_POST['session'];
        $date = $_POST['dateSession'];
        $questionList = $_POST['questionList'];
        $link = '/questionnaire/'.$patient_id.'/'.$session.'/'.$questionList.'/'.$date;

        try{
            AllowedQuery::query()->insert([
                'query' => $link
            ]);
        }
        catch (\Exception $e){
            return view('feedback-session', ['patients' => $patients, 'questionLists' => $questionLists, 'message' => 'This combination already exists.']);
        }

        return view('feedback-session', ['patients' => $patients, 'questionLists' => $questionLists, 'link' => $link]);
    }
}
