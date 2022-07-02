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
        Schema::create('usta2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data');
            $table->string('name');
            $table->string('tel')->nullable();
            $table->string('texnika')->nullable();
            $table->string('muammo')->nullable();
            $table->string('usta')->nullable();
            $table->string('xulosa')->nullable();
            $table->integer('vizp')->nullable();
            $table->integer('summa')->nullable();
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
        Schema::dropIfExists('usta2s');
    }
};
