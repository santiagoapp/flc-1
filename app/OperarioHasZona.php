<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperarioHasZona extends Model
{
	public $timestamps = false;

	public function zonas()
	{
		return $this->belongsTo('App\Zona');
	}
	public function persona()
	{
		return $this->belongsTo('App\Persona');
	}
}
