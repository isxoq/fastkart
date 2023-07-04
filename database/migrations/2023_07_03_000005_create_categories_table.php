<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('name');
            $table->boolean('status')->default(0)->nullable();
            $table->string('sort_order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}