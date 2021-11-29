<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patienten';

    use HasFactory;

    public function therapeut(){
        return $this->belongsTo(User::class);
    }

    public function sessies(){
        return $this->hasMany(Sessie::class);
    }

    public function antwoorden(){
        return $this->hasMany(Antwoord::class);
    }
}
