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
        Schema::create('pribldoks', function (Blueprint $table) {
            $table->id();
            $table->string('jami')->nullable();
            $table->string('karz')->nullable();
            $table->string('pribl')->nullable();
            $table->string('vse')->nullable();
            $table->string('rasxod')->nullable();
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
        Schema::dropIfExists('pribldoks');
    }
};
