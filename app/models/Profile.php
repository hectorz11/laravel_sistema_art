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

	public static function updateProfile($input, $id)
	{
		$answer = [];
		$user = User::find($id);
		$rules = [
			'first_name' => 'required',
			'email' => 'required|email|unique:users,email,' . $user->id,
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$user->first_name = $input['first_name'];
			$user->last_name = $input['last_name'];
			$user->email = $input['email'];
			$user->save();

			$profile = self::find($user->profiles->id);
			if (Input::has('photo')) $profile->photo = $input['photo'];
			else $profile->photo = '';
			$profile->birthday = $input['birthday'];
			$profile->phone = $input['phone'];
			$profile->gender = $input['gender'];
			$profile->user_id = $user->id;

			if ($profile->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'PROFILE UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	} 
}