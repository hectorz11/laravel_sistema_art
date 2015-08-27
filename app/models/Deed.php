<?php

class Deed extends \Eloquent {

	protected $table = 'deeds';

	protected $fillable = ['notary_id','number_deeds','protocol','folio','given_by','pro',
		'type_writing','date','number_folios','description','status'];

	public function notaries()
	{
		return $this->belongsTo('Deed','notary_id');
	}

	public function allDeeds() 
	{
		return self::all();
	}

	public static function createDeed($input)
	{
		$answer = [];
		$rules = [
			'notary_id' => 'required|integer',
			'number_deeds' => 'required',
			'protocol' => 'required',
			'folio' => 'required',
			'given_by' => 'required',
			'pro' => 'required',
			'type_writing' => 'required',
			'date' => 'required',
			'number_folios' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$deed = new Deed;
			$deed->notary_id = Input::get('notary_id');
			$deed->number_deeds = Input::get('number_deeds');
			$deed->protocol = Input::get('protocol');
			$deed->folio = Input::get('folio');
			$deed->given_by = Input::get('given_by');
			$deed->pro = Input::get('pro');
			$deed->type_writing = Input::get('type_writing');
			$deed->date = Input::get('date');
			$deed->number_folios = Input::get('number_folios');
			$deed->description = Input::get('description');
			$deed->status = 1;

			if ($deed->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'DEED CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateDeed($input, $id)
	{
		$answer = [];
		$rules = [
			'notary_id' => 'required|integer',
			'number_deeds' => 'required',
			'protocol' => 'required',
			'folio' => 'required',
			'given_by' => 'required',
			'pro' => 'required',
			'type_writing' => 'required',
			'date' => 'required',
			'number_folios' => 'required',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$deed = Deed::find($id);
			$deed->notary_id = Input::get('notary_id');
			$deed->number_deeds = Input::get('number_deeds');
			$deed->protocol = Input::get('protocol');
			$deed->folio = Input::get('folio');
			$deed->given_by = Input::get('given_by');
			$deed->pro = Input::get('pro');
			$deed->type_writing = Input::get('type_writing');
			$deed->date = Input::get('date');
			$deed->number_folios = Input::get('number_folios');
			$deed->description = Input::get('description');

			if ($deed->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'DEED UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}