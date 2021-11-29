<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vraag extends Model
{

    protected $table = 'vragen';

    use HasFactory;

    public function vragenLijst(){
        return $this->belongsTo(Vragenlijst::class);
    }

    public function antwoorden(){
        return $this->hasMany(Antwoord::class);
    }
}
