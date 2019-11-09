<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedInteger('cat_id')->nullable();
            $table->unsignedInteger('sub_cat')->nullable();
            $table->string('summary');
            $table->text('description');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->string('thumb')->nullable();
            $table->string('brand')->nullable();
            $table->enum('is_trending',['yes','no'])->default('no');
            $table->enum('is_featured',['yes','no'])->default('no');
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('seotitle');
            $table->string('seokeyword');
            $table->string('seodescription');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('sub_cat')->references('id')->on('categories')->onDelete('SET NULL');


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
        Schema::dropIfExists('products');
    }
}
