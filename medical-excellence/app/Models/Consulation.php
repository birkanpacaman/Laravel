<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulation extends Model {
	protected $table = "consulations";
	public $primaryKey = "id";
	public $timestamps = true;
	protected $fillable = [ 
			"name",
			"email",
			"phone"
	];
	protected $guarded = [ 
			"id"
	];
}