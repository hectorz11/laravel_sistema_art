<?php

class Record extends \Eloquent {

	protected $table = 'records';

	protected $fillable = ['municipality_id','number_starting','folio','file','date',
		'interested_m','interested_f','starting','description','status'];

	public function municipalities()
	{
		return $this->belongsTo('Municipality','municipality_id');
	}

	public function allRecords()
	{
		return self::whereStatus(1)->get();
	}

	public function selectRecord($id)
	{
		return self::find($id);
	}

	public static function createRecord($input)
	{
		$answer = [];
		$rules = [
			'municipality_id' => 'required|integer',
			'number_starting' => 'required',
			'folio' => 'required',
			'file' => 'required',
			'date' => 'required',
			'interested_m' => 'required',
			'interested_f' => 'required',
			'starting' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$record = new Record;
			$record->municipality_id = $input['municipality_id'];
			$record->number_starting = $input['number_starting'];
			$record->folio = $input['folio'];
			$record->file = $input['file'];
			$record->date = $input['date'];
			$record->interested_m = $input['interested_m'];
			$record->interested_f = $input['interested_f'];
			$record->starting = $input['starting'];
			$record->description = $input['description'];
			$record->status = 1;

			if ($record->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'RECORD CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateRecord($input, $id)
	{
		$answer = [];
		$rules = [
			'municipality_id' => 'required|integer',
			'number_starting' => 'required',
			'folio' => 'required',
			'file' => 'required',
			'date' => 'required',
			'interested_m' => 'required',
			'interested_f' => 'required',
			'starting' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$record = Record::find($id);
			$record->municipality_id = $input['municipality_id'];
			$record->number_starting = $input['number_starting'];
			$record->folio = $input['folio'];
			$record->file = $input['file'];
			$record->date = $input['date'];
			$record->interested_m = $input['interested_m'];
			$record->interested_f = $input['interested_f'];
			$record->starting = $input['starting'];
			$record->description = $input['description'];

			if ($record->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'RECORD UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}