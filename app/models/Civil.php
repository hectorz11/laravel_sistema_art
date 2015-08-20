<?php

class Civil extends \Eloquent {

	protected $table = 'civils';

	protected $fillable = ['number_civil','date','demandant','defendant','matery','secretary',
		'file','references','description','status'];
}