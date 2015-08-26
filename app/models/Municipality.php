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
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'MUNICIPALITY CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateMunicipality($input, $id)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$municipality = Municipality::find($id);
			$municipality->name = Input::get('name');

			if ($municipality->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'MUNICIPALITY UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}