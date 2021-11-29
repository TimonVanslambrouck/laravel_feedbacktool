<?php

namespace App\Http\Controllers;

use App\Models\AllowedEmail;
class AddUsersController extends Controller
{
    function store() {
        try {
            AllowedEmail::query()->insert([
                    'email' => request('email-address'),
                ]
            );
            return view('add-users', ['message' => 'Email added, the therapist can now register.']);
        } catch (\Exception $e){
                return view('add-users', ['message' => 'Email has already been added']);
        }
    }
}
