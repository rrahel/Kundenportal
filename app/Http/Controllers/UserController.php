<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class UserController extends Controller {
	public function __construct() {
		$this->middleware ( 'auth' );
	}
	// display a list of all the user's bills
	public function index(Request $request) {
		$users = DB::table ( 'users' )->join ( 'role_user', 'users.id', '=', 'role_user.user_id' )->join ( 'roles', 'roles.id', '=', 'role_user.role_id' )->select ( 'users.*', 'roles.name as role_name' )->get ();
		return view ( 'users.index', [ 
				'users' => $users 
		] );
	}
	public function destroy(Request $request, User $user) {
		$user->delete ();
		return redirect ( '/listUsers' );
	}
	public function add() {
		$roles = Role::all ();
		return view ( 'users.addUser', [ 
				'roles' => $roles 
		] );
	}
	public function edit($id) {
		$user = User::findOrFail ( $id );
		$roles = User::find ( $id )->roles;
		// var_dump($roles->$roleid);
		return view ( 'users.edituser', [ 
				'user' => $user,
				'roles' => $roles 
		] );
	}
	public function update($id, Request $request) {
		$user = User::findOrFail ( $id );
		$input = $request->all ();
		$user->fill ( $input )->save ();
		return redirect ( '/listUsers' );
	}
	public function store(Request $request) {
		$this->validate ( $request, [ 
				'email' => 'required|unique:users|max:255',
				'password' => 'required|min:6|confirmed',
				'password_confirmation' => 'required' 
		] );
		$entry = new User ();
		$entry->firma = $request->firma;
		$entry->title = $request->title;
		$entry->name = $request->name;
		$entry->email = $request->email;
		$entry->addresse = $request->addresse;
		$entry->plz = $request->plz;
		$entry->ort = $request->ort;
		$entry->uid = $request->uid;
		$entry->tel = $request->tel;
		$entry->password = bcrypt ( $request->password );
		$entry->save ();

		$role = new Role ();
		$role->name = $request->role;
		$user = User::find ( $entry->id );
		$userRole = Role::where ( 'name', '=', $request->role )->get ()->first ();
		$roleId = Role::find ( $userRole->id );
		$user->attachRole ( $roleId );
		return redirect ( '/listUsers' );
	}
	// user profile
	public function getProfile() {
		$user = Auth::User ();
		return view ( 'users.profile', [ 
				'user' => $user 
		] );
	}
	public function updateProfile(Request $request) {
		$user = Auth::User ();
		$this->validate ( $request, [ 
				'email' => 'required' 
		] );
		$input = $request->all ();
		$user->fill ( $input )->save ();
		Mail::send ( 'emails.userProfileUpdate', array (
				'user' => $user 
		), function ($message) {
			$message->to ( 'rrahelcemi@gmail.com', 'Kunden Portal' )->subject ( 'User Profile Update' );
		} );
		return redirect ( '/bills' );
	}
}
