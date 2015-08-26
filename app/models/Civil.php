<?php

class Civil extends \Eloquent {

	protected $table = 'civils';

	protected $fillable = ['number_civil','date','demandant','defendant','matery','secretary',
		'file','references','description','status'];

	public static function createCivil($input)
	{
		$answer = [];
		$rules = [
			'number_civil' => 'required',
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
			$civil = new Civil;
			$civil->number_civil = Input::get('number_civil');
			$civil->date = Input::get('date');
			$civil->demandant = Input::get('demandant');
			$civil->defendant = Input::get('defendant');
			$civil->matery = Input::get('matery');
			$civil->secretary = Input::get('secretary');
			$civil->file = Input::get('file');
			$civil->references = Input::get('references');
			$civil->description = Input::get('description');
			$civil->status = 1;

			if ($civil->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'CIVIL CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateCivil($input, $id)
	{
		$answer = [];
		$rules = [
			'number_civil' => 'required',
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
			$civil = Civil::find($id);
			$civil->number_civil = Input::get('number_civil');
			$civil->date = Input::get('date');
			$civil->demandant = Input::get('demandant');
			$civil->defendant = Input::get('defendant');
			$civil->matery = Input::get('matery');
			$civil->secretary = Input::get('secretary');
			$civil->file = Input::get('file');
			$civil->references = Input::get('references');
			$civil->description = Input::get('description');

			if ($civil->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'CIVIL UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}