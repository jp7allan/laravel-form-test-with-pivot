<?php

class Detail extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);

	public function products()
	{
		return $this->belongsToMany('Product', 'detail_product');
	}
}
