<?php

class Product extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'price' => 'required',
		'description' => 'required',
		'category_id' => 'required',
	);
	
	public function category()
	{
		return $this->belongsTo('Category');
	}
	
	public function details()
	{
		return $this->belongsToMany('Detail', 'detail_product');
	}
}
