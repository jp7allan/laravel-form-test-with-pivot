<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotDetailProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_product', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('detail_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('detail_id')->references('id')->on('details')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detail_product');
	}

}
