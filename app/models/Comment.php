<?php

class Comment extends \Eloquent {

	protected $table = 'comments';

	protected $fillable = ['description','profile_id','status'];

	public function profiles()
	{
		return $this->belongsTo('Profile','profile_id');
	}

	public function allComments()
	{
		return self::whereStatus(1)->get();
	}

	public function selectComment($id)
	{
		return self::find($id);
	}
}