<?php

class Deed extends \Eloquent {

	protected $table = 'deeds';

	protected $fillable = ['notary_id','number_deeds','protocol','folio','given_by','pro',
		'type_writing','date','number_folios','description','status'];

	public function notaries()
	{
		return $this->belongsTo('Deed','notary_id');
	}

}