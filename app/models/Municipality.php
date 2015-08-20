<?php

class Municipality extends \Eloquent {

	protected $table = 'municipalities';

	protected $fillable = ['name','status'];

	public function records()
	{
		return $this->hasMany('Record','municipality_id');
	}

	public static function createMunicipality($input)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$municipality = new Municipality;
			$municipality->name = Input::get('name');
			$municipality->status = 1;

			if ($municipality->save()) {
				$answer['message'] = 'Ha sido creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'CREATE MUNICIPALITY error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}