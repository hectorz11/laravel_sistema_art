<?php

class Penal extends \Eloquent {

	protected $table = 'penals';

	protected $fillable = ['number_penal','acussed','start_date','crime','aggrieved','judge',
		'scribe','references','description','status'];

	public function allPenals()
	{
		return self::whereStatus(1)->get();
	}

	public function selectPenal($id)
	{
		return self::find($id);
	}

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
			$penal = new self;
			$penal->number_penal = $input['number_penal'];
			$penal->acussed = $input['acussed'];
			$penal->start_date = $input['start_date'];
			$penal->crime = $input['crime'];
			$penal->aggrieved = $input['aggrieved'];
			$penal->judge = $input['judge'];
			$penal->scribe = $input['scribe'];
			$penal->references = $input['references'];
			$penal->description = $input['description'];
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
			$penal = self::find($id);
			$penal->number_penal = $input['number_penal'];
			$penal->acussed = $input['acussed'];
			$penal->start_date = $input['start_date'];
			$penal->crime = $input['crime'];
			$penal->aggrieved = $input['aggrieved'];
			$penal->judge = $input['judge'];
			$penal->scribe = $input['scribe'];
			$penal->references = $input['references'];
			$penal->description = $input['description'];

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