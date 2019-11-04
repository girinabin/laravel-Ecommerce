<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('image')->default('ecommerce');
            $table->string('link');
            $table->enum('status',['active','inactive'])->default('active');
            $table->unsignedInteger('added_by')->nullable();
            $table->foreign('added_by')
            ->references('id')->on('users')
            ->onDelete('set null');
            $table->string('seotitle');
            $table->string('seokeyword');
            $table->string('seodescription');
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
        Schema::dropIfExists('banners');
    }
}
