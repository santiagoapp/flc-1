<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		return view('users');
	}
	public function getUsers(){
		return User::orderBy('id','desc')->get();
	}
	public function deleteUser(Request $request){
		$user = User::findOrFail($request->id);
		$user->delete();
		return 'El registro ha sido eliminado';
	}
}
