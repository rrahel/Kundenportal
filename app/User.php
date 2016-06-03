<?php

namespace App;

use App\Bill;
use App\Contract;
use App\Provisions;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable {
	use EntrustUserTrait;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
			'firma',
			'title',
			'name',
			'email',
			'addresse',
			'plz',
			'ort',
			'uid',
			'tel',
			'password' 
	];
	
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [ 
			'password',
			'remember_token' 
	];
	
	/**
	 * Get all of the bills for the user.
	 */
	public function bills() {
		return $this->hasMany ( Bill::class );
	}
	
	/**
	 * Get all of the contracts for the user.
	 */
	public function contracts() {
		return $this->hasMany ( Contract::class );
	}
	public function provisions() {
		return $this->hasMany ( Provisions::class );
	}
	public function partnerOffers() {
		return $this->hasMany ( PartnerOffer::class );
	}
}
