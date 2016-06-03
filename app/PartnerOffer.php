<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerOffer extends Model {
	protected $table = "partnerOffers";
	protected $fillable = [ 
			'angebotId',
			'firma',
			'filename' 
	]
	// 'mime',
	// 'original_filename'
	;
	protected $casts = [ 
			'user_id' => 'int' 
	];
	
	// get the user that owns the bill
	public function user() {
		return $this->belongsTo ( User::class );
	}
}
