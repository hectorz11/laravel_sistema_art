<?php

class Agrarian extends \Eloquent {

	protected $table = 'agrarians';

	protected $fillable = ['number_agrarian','date','demandant','defendant','matery','secretary',
		'file','references','description','status'];
}