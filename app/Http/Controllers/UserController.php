<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
		$user->getRoleNames();
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
		$user->syncRoles($request->rol);
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
	public function addUser(Request $request)
	{
		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'password_confirmation' => 'required'
		]);
		if($request->password == $request->password_confirmation)
		{
			$user = User::create(request(['name', 'email', 'password']));
			$user->syncRoles($request->rol);
			return response()->json([
				'mensaje' => 'Usuario guardado'
			]);
		}
		return response()->json([
			'mensaje' => 'Las contraseñas no coinciden'
		]);
	}
}
