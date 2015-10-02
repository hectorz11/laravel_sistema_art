<?php

class Token extends \Eloquent {

	protected $table = 'tokens';

	protected $fillable = ['user_id','api_token','expires_on','client'];

	public function scopeValid()
    {
        return !Carbon\Carbon::createFromTimeStamp(strtotime($this->expires_on))->isPast();
    }

    public function users()
    {
        return $this->belongsTo('User','user_id');
    }
}