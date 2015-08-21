<?php

class Notary extends \Eloquent {

	protected $table = 'notaries';

	protected $fillable = ['name','status'];

	public function deeds()
	{
		return $this->hasMany('Deed','notary_id');
	}

	public static function create($input)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$notary = new Notary;
			$notary->name = Input::get('name');
			$notary->status = 1;

			if ($notary->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'NOTARY CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function update($input, $id)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$notary = Notary::find($id);
			$notary->name = Input::get('name');

			if ($notary->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'NOTARY UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}