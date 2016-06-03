<?php

namespace App\Repositories;

use App\User;
use App\Contract;

class ContractRepository {
	// get all the contracts for a given user
	public function forHostingAdmin(User $user) {
		return Contract::where ( 'user_id', $user->id, '&&', 'hosting = 1 && service = 0 &&' )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forServiceAdmin(User $user) {
		return Contract::where ( 'user_id', $user->id, '&&', 'service = 1 && hosting = 0 &&' )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forHostingClient(User $user) {
		return Contract::where ( 'client', $user->name, '&&', 'hosting = 1 && service = 0 &&' )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forServiceClient(User $user) {
		return Contract::where ( 'client', $user->name, '&&', 'service = 1 && hosting = 0 &&' )->orderBy ( 'created_at', 'asc' )->get ();
	}
}