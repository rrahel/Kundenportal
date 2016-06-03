<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {
	protected $fillable = [ 
			'menge',
			'beschreibung',
			'einzelpreis',
			'steuern',
			'preis',
			'hosting',
			'service' 
	];
	protected $casts = [ 
			'user_id' => 'int' 
	];
	
	// get the user that owns the bill
	public function user() {
		return $this->belongsTo ( User::class );
	}
}
