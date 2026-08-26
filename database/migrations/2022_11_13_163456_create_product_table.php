<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string("product_name");
            $table->unsignedBigInteger("cate_id");
            $table->unsignedBigInteger("size_id");
            $table->unsignedBigInteger("brand_id");
            $table->string("product_unit");
            $table->string("product_SKU");
            $table->unsignedBigInteger("product_min_qty");
            $table->unsignedBigInteger("product_qty");
            $table->string("product_desc");
            $table->unsignedBigInteger("product_price");
           
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->foreign('size_id')->references('size_id')->on('sizes');
            $table->foreign('brand_id')->references('brand_id')->on('brands');
            $table->timestamps();
        });
        Schema::table('product', function (Blueprint $table) {
            $table->string('product_img')->nullable()->after('product_desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('product_img');
        });
    }
};
