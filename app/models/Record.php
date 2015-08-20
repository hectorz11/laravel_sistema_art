<?php

class Record extends \Eloquent {

	protected $table = 'records';

	protected $fillable = ['municipality_id','number_starting','folio','file','date',
		'interested_m','interested_f','starting','description','status'];

	public function municipalities()
	{
		return $this->belongsTo('Municipality','municipality_id');
	}
}