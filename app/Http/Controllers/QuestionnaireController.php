<?php

namespace App\Http\Controllers;

use App\Models\AllowedQuery;
use App\Models\Antwoord;
use App\Models\Patient;
use App\Models\Sessie;
use App\Models\Vraag;
use App\Models\Vragenlijst;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class QuestionnaireController extends Controller
{
    public function viewQuestionnaire($patient_id,$sessionNumber,$questionList_id,$date)
    {
        $exists = AllowedQuery::query()
            ->where('query', '=', "/questionnaire/$patient_id/$sessionNumber/$questionList_id/$date")
            ->get();

        if (count($exists)==0){
            return redirect('/thanks');
        }
        $vragenlijsten = Vragenlijst::query()->where('id', '=', $questionList_id )->get();
        $questions = $this->getQuestions($vragenlijsten);

        return view('questionnaire', ['patient_id' => $patient_id, 'sessionNumber' => $sessionNumber, 'questionList' => $vragenlijsten, 'questions' => $questions, 'date' => $date]);

    }

    public function submitQuestionnaire($patient_id,$sessionNumber,$questionList_id,$date): string
    {
        Patient::query()->where('id', '=', $patient_id)->update(['updated_at' => date('Y-m-d H:i:s')]);

        Sessie::query()->insert([
            'patient_id' => $patient_id,
            'nummer' => $sessionNumber,
            'datum' => $date
        ]);

        $session = Sessie::query()->where('nummer', '=', $sessionNumber)->get();
        $session_id = $session[0]->id;

        $vragenlijsten = Vragenlijst::query()->where('id', '=', $questionList_id )->get();
        $questions = $this->getQuestions($vragenlijsten);

        foreach ($questions as $question){
            $currentQuestion = $question[0];
            $id = $currentQuestion->id;
            $score = $_POST["{$id}"][0];

            Antwoord::query()->insert([
                'sessie_id' => $session_id,
                'vragenLijst_id' => $questionList_id,
                'vraag_id' => $currentQuestion->id,
                'score' => $score
            ]);
        }

        AllowedQuery::query()
            ->where('query', '=', "/questionnaire/$patient_id/$sessionNumber/$questionList_id/$date")
            ->delete();

        return redirect('/thanks');

    }

    private function getQuestions($vragenlijsten){
        $ids = [];
        $questions = [];

        foreach ($vragenlijsten as $item){
            $ids = explode(" ", $item->vraag_ids);
        }

        foreach ($ids as $id){
            $question = Vraag::query()->where('id', '=', $id)->get();
            array_push($questions, $question);
        }
        return $questions;
    }

}
