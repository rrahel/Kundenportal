<?php

namespace App\Policies;

use App\User;
use App\Bill;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillPolicy {
	use HandlesAuthorization;
	
	/**
	 * Determine if the given user can delete the given bill.
	 *
	 * @param User $user        	
	 * @param Bill $bill        	
	 * @return bool
	 */
	public function destroy(User $user, Bill $bill) {
		return $user->id === $bill->user_id;
	}
}
