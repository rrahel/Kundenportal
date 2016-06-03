<?php

namespace App\Repositories;

use App\User;
use App\Provisions;

class ProvisionRepository {
	/**
	 * Get all of the bills for a given user.
	 *
	 * @param User $user        	
	 * @return Collection
	 */
	public function forAdmin(User $user) {
		return Provisions::where ( 'user_id', $user->id )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forPartner(User $user) {
		return Provisions::where ( 'partner', $user->name )->orderBy ( 'created_at', 'asc' )->get ();
	}
}
