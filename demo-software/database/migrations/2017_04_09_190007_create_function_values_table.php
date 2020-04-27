<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('function_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('x')->unique();
            $table->integer('fx')->comment('function(x)');
            $table->integer('base')->comment('g');
            $table->integer('modulus')->comment('x');;
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
        Schema::dropIfExists('function_values');
    }
}
