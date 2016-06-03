<?php

namespace App\Repositories;

use App\User;
use App\Bill;

class BillRepository {
	/**
	 * Get all of the bills for a given user.
	 *
	 * @param User $user        	
	 * @return Collection
	 */
	public function forAdmin(User $user) {
		return Bill::where ( 'user_id', $user->id )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forClient(User $user) {
		return Bill::where ( 'client', $user->name )->orderBy ( 'created_at', 'asc' )->get ();
	}
}
