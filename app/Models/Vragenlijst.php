<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vragenlijst extends Model
{

    protected $table = 'vragenlijsten';

    use HasFactory;

    public function vragen(){
        return $this->hasMany(Vraag::class);
    }
}
