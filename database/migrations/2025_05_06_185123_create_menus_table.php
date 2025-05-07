<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
