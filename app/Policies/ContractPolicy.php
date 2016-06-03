<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Contract;

class ContractPolicy {
	use HandlesAuthorization;
	
	/**
	 * Determine if the given user can delete the given contract.
	 *
	 * @param User $user        	
	 * @param Contact $contact        	
	 * @return bool
	 */
	public function destroy(User $user, Contract $contract) {
		return $user->id === $contract->user_id;
	}
}
