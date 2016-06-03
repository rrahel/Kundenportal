<?php

namespace App\Policies;

use App\User;
use App\Provisions;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvisionPolicy {
	use HandlesAuthorization;
	public function destroy(User $user, Provisions $provision) {
		return $user->id === $provision->user_id;
	}
}
