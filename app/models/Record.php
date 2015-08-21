<?php

class Record extends \Eloquent {

	protected $table = 'records';

	protected $fillable = ['municipality_id','number_starting','folio','file','date',
		'interested_m','interested_f','starting','description','status'];

	public function municipalities()
	{
		return $this->belongsTo('Municipality','municipality_id');
	}

	public static function create($input)
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
			$record->municipality_id = Input::get('municipality_id');
			$record->number_starting = Input::get('number_starting');
			$record->folio = Input::get('folio');
			$record->file = Input::get('file');
			$record->date = Input::get('date');
			$record->interested_m = Input::get('interested_m');
			$record->interested_f = Input::get('interested_f');
			$record->starting = Input::get('starting');
			$record->description = Input::get('description');
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

	public static function update($input, $id)
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
			$record->municipality_id = Input::get('municipality_id');
			$record->number_starting = Input::get('number_starting');
			$record->folio = Input::get('folio');
			$record->file = Input::get('file');
			$record->date = Input::get('date');
			$record->interested_m = Input::get('interested_m');
			$record->interested_f = Input::get('interested_f');
			$record->starting = Input::get('starting');
			$record->description = Input::get('description');

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