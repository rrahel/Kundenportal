<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model {
	protected $fillable = [ 
			'beschreibung',
			'filename',
			'mime',
			'original_filename' 
	];
}
