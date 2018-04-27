<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function operariosHasZona()
    {
        return $this->hasOne('App\OperarioHasZona');
    }
}
