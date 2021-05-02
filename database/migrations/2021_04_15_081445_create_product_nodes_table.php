<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_nodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('main_listing_node')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('price')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('image')->nullable();
            $table->string('image_url')->nullable();
            $table->string('rating')->nullable();
            $table->string('product_link')->nullable();
            $table->string('product_url')->nullable();
            $table->string('last_updated')->nullable();
            $table->string('substr')->nullable();
            $table->string('explode')->nullable();
            $table->string('substr_strpos')->nullable();
            $table->string('str_replace')->nullable();
            $table->string('replace_with')->nullable();
            $table->string('append_str')->nullable();
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
        Schema::dropIfExists('product_nodes');
    }
}
