<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends BaseModel
{
	protected $fillable = ['created_by', 'rest_id', 'content', 'score', 'price'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}
}
