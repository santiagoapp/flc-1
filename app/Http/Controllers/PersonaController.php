<?php

namespace App\Http\Controllers;
use App\Persona;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
	public function index()
	{
		return view('personas');
	}
	public function getPersonas(){
		return Persona::orderBy('id','desc')->get();
	}
}
