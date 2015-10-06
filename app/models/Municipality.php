<?php

class Municipality extends \Eloquent {

	protected $table = 'municipalities';

	protected $fillable = ['name','status'];

	public function records()
	{
		return $this->hasMany('Record','municipality_id');
	}

	public function allMunicipalitiesActivated()
	{
		return self::whereStatus(1)->get();
	}

	public function allMunicipalitiesDisabled()
	{
		return self::whereStatus(0)->get();
	}

	public function selectMunicipality($id)
	{
		return self::find($id);
	}

	public function valor($id)
	{
		$municipality = self::find($id);
		if ($municipality->status == 1) return true;
		else return false;
	}

	public static function createMunicipality($input)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$municipality = new Municipality;
			$municipality->name = $input['name'];
			$municipality->status = 1;

			if ($municipality->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'MUNICIPALITY CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updateMunicipality($input, $id)
	{
		$answer = [];
		$rules = ['name' => 'required'];
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$municipality = Municipality::find($id);
			$municipality->name = $input['name'];
			if (Input::has('status')) $municipality->status = $input['status'];
			else $municipality->status = 0;

			if ($municipality->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
			} else {
				$answer['message'] = 'MUNICIPALITY UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}