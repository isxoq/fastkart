<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_sale')->default(0)->nullable();
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->datetime('sale_start')->nullable();
            $table->datetime('end_sale')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->boolean('is_trend')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
