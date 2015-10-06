<?php

class Notary extends \Eloquent {

	protected $table = 'notaries';

	protected $fillable = ['name','status'];

	public function deeds()
	{
		return $this->hasMany('Deed','notary_id');
	}

	public function allNotariesActivated()
	{
		return self::whereStatus(1)->get();
	}

	public function allNotariesDisabled()
	{
		return self::whereStatus(0)->get();
	}

	public function selectNotary($id)
	{
		return self::find($id);
	}

	public function valor($id)
	{
		$notary = self::find($id);
		if ($notary->status == 1) return true;
		else return false;
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
			$notary->name = $input['name'];
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

	public static function updateNotary($input, $id)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$notary = Notary::find($id);
			$notary->name = $input['name'];
			if (Input::has('status')) $notary->status = $input['status'];
			else $notary->status = 0;

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