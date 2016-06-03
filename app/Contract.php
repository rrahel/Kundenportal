<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model {
	protected $fillable = [ 
			'name',
			'von',
			'bis',
			'bezahlt_bis',
			'hosting',
			'service',
			'mindestvertragslaufzeit',
			'filename',
			'mime',
			'original_filename' 
	];
	protected $casts = [ 
			'user_id' => 'int' 
	];
	
	// get the user that owns the bill
	public function user() {
		return $this->belongsTo ( User::class );
	}
}
