<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->double('product_commission',10,2);
            $table->string('bname');
            $table->string('bemail')->nullable();
            $table->string('bphone')->nullable();
            $table->longtext('baddress')->nullable();
            $table->string('bdistrict')->nullable();
            $table->string('delveryonday')->nullable();
            $table->string('delverytime')->nullable();
            $table->longtext('special_ins')->nullable();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('is_approve')->default(2);
            $table->integer('is_paid')->default(2);
            $table->integer('is_complete')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_products');
    }
}
