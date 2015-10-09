<?php

class Profile extends \Eloquent {

	protected $table = 'profiles';

	protected $fillable = ['photo','birthday','phone','gender','user_id','status'];

	public function users()
	{
		return $this->belongsTo('User','user_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment','profile_id');
	}
}