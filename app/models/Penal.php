<?php

class Penal extends \Eloquent {

	protected $table = 'penals';

	protected $fillable = ['number_penal','acussed','start_date','crime','aggrieved','judge',
		'scribe','references','description','status'];
}