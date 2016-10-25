<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends BaseModel
{
    protected $fillable = ['rest_id', 'user_id'];

	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}
}
