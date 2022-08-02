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
            $table->bigInteger('tavardok_id')->unsigned();
            $table->string('adress')->nullable();
            $table->bigInteger('tavar2dok_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->string('hajm')->nullable();
            $table->string('summa')->nullable();
            $table->string('summa2')->nullable();
            $table->string('summa3')->nullable();
            $table->string('kurs')->nullable();
            $table->string('kurs2')->nullable();
            $table->string('kod')->nullable();
            $table->timestamps();
            $table->foreign('tavardok_id')->references('id')->on('tavardoks')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tavar2dok_id')->references('id')->on('tavar2doks')
            ->onDelete('cascade')->onUpdate('cascade');
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
