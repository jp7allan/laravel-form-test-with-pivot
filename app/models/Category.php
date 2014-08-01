<?php

class Category extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
	
	public function products()
	{
		return $this->hasMany('Product');
	}
}
