<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends BaseModel
{
    protected $fillable = ['friend_id', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function allFriends($userId)
	{
		return self::join('users', 'users.id', '=', 'friends.user_id')
					->where('friends.user_id', '=', $userId)
					->orWhere('friends.friend_id', '=', $userId)
					->where('friends.status', '=', 1)
					->orderBy('users.name');
	}

	public function pendingFriends($userId)
	{
		return self::join('users', 'users.id', '=', 'friends.user_id')
					->where('friends.user_id', '=', $userId)
					->orWhere('friends.friend_id', '=', $userId)
					->where('friends.status', '=', 0)
					->where('friends.action_id', '=', $userId)
					->orderBy('users.name');
	}

	public function friendRequest()
}
