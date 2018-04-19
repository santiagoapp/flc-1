<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;

class MapaController extends Controller
{
	public function index()
	{
		return view('mapa');
	}
	public function getZonas()
	{
		return Zona::orderBy('id','desc')->get();
	}
}
