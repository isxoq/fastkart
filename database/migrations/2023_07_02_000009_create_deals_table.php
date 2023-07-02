<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('begin')->nullable();
            $table->datetime('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
