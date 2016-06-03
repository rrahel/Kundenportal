<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model {
	protected $fillable = [ 
			'client',
			'name',
			'filename',
			'mime',
			'original_filename' 
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
