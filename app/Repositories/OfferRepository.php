<?php

namespace App\Repositories;

use App\User;
use App\Offer;
use App\CreatedOffers;
use App\PartnerOffer;

class OfferRepository {
	public function forHosting() {
		return Offer::where ( 'hosting', 1 )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forService() {
		return Offer::where ( 'service', 1 )->orderBy ( 'created_at', 'asc' )->get ();
	}
	public function forPartner(User $user) {
		return PartnerOffer::where ( 'user_id', $user->id )->orderBy ( 'created_at', 'asc' )->get ();
	}

}