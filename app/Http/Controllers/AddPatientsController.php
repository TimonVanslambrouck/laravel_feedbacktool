<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
class AddPatientsController extends Controller
{
    function store () {
        try {
            Patient::query()->insert([
                    'initialen' => request('patient-initials'),
                    'therapeut_id' => Auth::id()
                ]
            );
            return view('add-patients', ['message' => 'Patient added.']);
        } catch (\Exception $e){
            return view('add-patients', ['message' => 'Patient already exists with those initials.']);
        }
    }
}
