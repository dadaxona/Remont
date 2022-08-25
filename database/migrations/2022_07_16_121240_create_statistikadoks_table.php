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
        Schema::create('statistikadoks', function (Blueprint $table) {
            $table->id();
            $table->string('foyda')->nullable();
            $table->string('kassa')->nullable();
            $table->string('pribl')->nullable();
            $table->string('limit')->nullable();
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
        Schema::dropIfExists('statistikadoks');
    }
};
