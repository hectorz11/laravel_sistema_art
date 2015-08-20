<?php

class Notary extends \Eloquent {

	protected $table = 'notaries';

	protected $fillable = ['name','status'];

	public function deeds()
	{
		return $this->hasMany('Deed','notary_id');
	}

	public static function createNotary($input)
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
				$answer['message'] = 'Ha sido creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'CREATE NOTARY error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}