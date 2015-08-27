<?php

class Penal extends \Eloquent {

	protected $table = 'penals';

	protected $fillable = ['number_penal','acussed','start_date','crime','aggrieved','judge',
		'scribe','references','description','status'];

	public static function createPenal($input)
	{
		$answer = [];
		$rules = [
			'number_penal' => 'required',
			'acussed' => 'required',
			'start_date' => 'required',
			'crime' => 'required',
			'aggrieved' => 'required',
			'judge' => 'required',
			'scribe' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$penal = new Penal;
			$penal->number_penal = Input::get('number_penal');
			$penal->acussed = Input::get('acussed');
			$penal->start_date = Input::get('start_date');
			$penal->crime = Input::get('crime');
			$penal->aggrieved = Input::get('aggrieved');
			$penal->judge = Input::get('judge');
			$penal->scribe = Input::get('scribe');
			$penal->references = Input::get('references');
			$penal->description = Input::get('description');
			$penal->status = 1;

			if ($penal->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'PENAL CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updatePenal($input, $id)
	{
		$answer = [];
		$rules = [
			'number_penal' => 'required',
			'acussed' => 'required',
			'start_date' => 'required',
			'crime' => 'required',
			'aggrieved' => 'required',
			'judge' => 'required',
			'scribe' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$penal = Penal::find($id);
			$penal->number_penal = Input::get('number_penal');
			$penal->acussed = Input::get('acussed');
			$penal->start_date = Input::get('start_date');
			$penal->crime = Input::get('crime');
			$penal->aggrieved = Input::get('aggrieved');
			$penal->judge = Input::get('judge');
			$penal->scribe = Input::get('scribe');
			$penal->references = Input::get('references');
			$penal->description = Input::get('description');

			if ($penal->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'PENAL UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}