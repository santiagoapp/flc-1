<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
	public $timestamps = false;

	public function operariosHasZona()
    {
        return $this->hasMany('App\OperarioHasZona');
    }
}
