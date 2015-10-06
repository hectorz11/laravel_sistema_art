<?php

class Deed extends \Eloquent {

	protected $table = 'deeds';

	protected $fillable = ['notary_id','number_deeds','protocol','folio','given_by','pro',
		'type_writing','date','number_folios','description','status'];

	public function notaries()
	{
		return $this->belongsTo('Notary','notary_id');
	}

	public function allDeeds() 
	{
		return self::whereStatus(1)->get();
	}

	public function selectDeed($id)
	{
		return self::find($id);
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
			$deed = new self;
			$deed->notary_id = $input['notary_id'];
			$deed->number_deeds = $input['number_deeds'];
			$deed->protocol = $input['protocol'];
			$deed->folio = $input['folio'];
			$deed->given_by = $input['given_by'];
			$deed->pro = $input['pro'];
			$deed->type_writing = $input['type_writing'];
			$deed->date = $input['date'];
			$deed->number_folios = $input['number_folios'];
			$deed->description = $input['description'];
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
			$deed = self::find($id);
			$deed->notary_id = $input['notary_id'];
			$deed->number_deeds = $input['number_deeds'];
			$deed->protocol = $input['protocol'];
			$deed->folio = $input['folio'];
			$deed->given_by = $input['given_by'];
			$deed->pro = $input['pro'];
			$deed->type_writing = $input['type_writing'];
			$deed->date = $input['date'];
			$deed->number_folios = $input['number_folios'];
			$deed->description = $input['description'];

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