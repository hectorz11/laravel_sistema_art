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

	public static function createComment($input, $id)
	{
		//
	}

	public static function updateComment($input, $id)
	{
		$answer = [];
		$rules = [
			'description' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$comment = self::find($id);
			$comment->description = $input['description'];

			if ($comment->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'COMMENT UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}