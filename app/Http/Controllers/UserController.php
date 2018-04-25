<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
	public function getUser(Request $request){
		$user = User::findOrFail($request->id);

		return $user;
	}
	public function deleteUser(Request $request){
		$user = User::findOrFail($request->id);
		$user->delete();
		return 'El registro ha sido eliminado';
	}
	public function update(Request $request)
	{
		// $user = User::where('email','=',$request->correo)->get();
		$user = User::findOrFail($request->id);

		if (Hash::check($request->contraseña_anterior, $user->password) &&
			$request->contraseña_nueva == $request->contraseña_repetida) {

			$user->update([
				'password' => Hash::make($request->contraseña_nueva)
			]);

			return response()->json([
				'mensaje' => 'Usuario actualizado'
			]);

		}
		return response()->json([
			'mensaje' => 'Contraseña incorrecta'
		]);
	}
}
