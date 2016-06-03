<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Offer;
use App\User;

class OfferPolicy {
	use HandlesAuthorization;
	public function destroy(User $user, Offer $offer) {
		return $user->id === $offer->user_id;
	}
}
