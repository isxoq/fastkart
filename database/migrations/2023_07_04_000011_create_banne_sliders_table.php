<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanneSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('banne_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sort_order')->nullable();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('title_3')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
