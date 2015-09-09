<?php

class Agrarian extends \Eloquent {

	protected $table = 'agrarians';

	protected $fillable = ['number_agrarian','date','demandant','defendant','matery','secretary',
		'file','references','description','status'];

	public function allAgrarians()
	{
		return self::whereStatus(1)->get();
	}

	public function selectAgrarian($id)
	{
		return self::find($id);
	}

	public static function createAgrarian($input)
	{
		$answer = [];
		$rules = [
			'number_agrarian' => 'required',
			'date' => 'required',
			'demandant' => 'required',
			'defendant' => 'required',
			'matery' => 'required',
			'secretary' => 'required',
			'file' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$agrarian = new self;
			$agrarian->number_agrarian = Input::get('number_agrarian');
			$agrarian->date = Input::get('date');
			$agrarian->demandant = Input::get('demandant');
			$agrarian->defendant = Input::get('defendant');
			$agrarian->matery = Input::get('matery');
			$agrarian->secretary = Input::get('secretary');
			$agrarian->file = Input::get('file');
			$agrarian->references = Input::get('references');
			$agrarian->description = Input::get('description');
			$agrarian->status = 1;

			if ($agrarian->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'AGRARIAN CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateAgrarian($input, $id)
	{
		$answer = [];
		$rules = [
			'number_agrarian' => 'required',
			'date' => 'required',
			'demandant' => 'required',
			'defendant' => 'required',
			'matery' => 'required',
			'secretary' => 'required',
			'file' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$agrarian = self::find($id);
			$agrarian->number_agrarian = Input::get('number_agrarian');
			$agrarian->date = Input::get('date');
			$agrarian->demandant = Input::get('demandant');
			$agrarian->defendant = Input::get('defendant');
			$agrarian->matery = Input::get('matery');
			$agrarian->secretary = Input::get('secretary');
			$agrarian->file = Input::get('file');
			$agrarian->references = Input::get('references');
			$agrarian->description = Input::get('description');

			if ($agrarian->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'AGRARIAN UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}