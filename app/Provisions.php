<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Provisions extends Model {
	protected $fillable = [ 
			'kunde',
			'vertrag',
			'von',
			'bis',
			'summe',
			'abgerechnet'
	];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [ 
			'user_id' => 'int' 
	];
	
	// get the user that owns the bill
	public function user() {
		return $this->belongsTo ( User::class );
	}
}
