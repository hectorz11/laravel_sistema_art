<?php

class Civil extends \Eloquent {

	protected $table = 'civils';

	protected $fillable = ['number_civil','date','demandant','defendant','matery','secretary',
		'file','references','description','status'];

	public function allCivils()
	{
		return self::whereStatus(1)->get();
	}

	public function selectCivil($id)
	{
		return self::find($id);
	}

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
			$civil = new self;
			$civil->number_civil = $input['number_civil'];
			$civil->date = $input['date'];
			$civil->demandant = $input['demandant'];
			$civil->defendant = $input['defendant'];
			$civil->matery = $input['matery'];
			$civil->secretary = $input['secretary'];
			$civil->file = $input['file'];
			$civil->references = $input['references'];
			$civil->description = $input['description'];
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
			$civil = self::find($id);
			$civil->number_civil = $input['number_civil'];
			$civil->date = $input['date'];
			$civil->demandant = $input['demandant'];
			$civil->defendant = $input['defendant'];
			$civil->matery = $input['matery'];
			$civil->secretary = $input['secretary'];
			$civil->file = $input['file'];
			$civil->references = $input['references'];
			$civil->description = $input['description'];

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