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
        Schema::create('ichkitavardoks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->float('hajm')->nullable();
            $table->float('summa')->nullable();
            $table->float('summa2')->nullable();
            $table->float('summa3')->nullable();
            $table->float('kurs')->nullable();
            $table->float('kurs2')->nullable();
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
        Schema::dropIfExists('ichkitavardoks');
    }
};
