<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antwoord extends Model
{

    protected $table = 'antwoorden';

    use HasFactory;

    public function vraag(){
        return $this->belongsTo(Vraag::class);
    }

    public function sessie(){
        return $this->belongsTo(Sessie::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
