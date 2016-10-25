<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends BaseModel
{
    public static $rules = [
    	'name' => 'required',
    	'address' => 'required',
    	'city' => 'required',
    	'state' => 'required',
    	'zipcode' => 'required',
    	'cuisine' => 'required'
    ];

    public function reviews()
    {
    	return $this->hasMany('App\Models\Review', 'rest_id');
    }

    public static function search($searchTerm)
    {
        return self::where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('city', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('state', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('zipcode', 'LIKE', '%' . $searchTerm . '%')
                    ->orderBy('name', 'desc');
    }

    public function score()
    {
        return $this->reviews()->avg('score');
    }

    public function price()
    {
        return $this->reviews()->avg('price');
    }

    public function ownedBy($user)
    {
        return ($user->id == $this->created_by);
    }
}
