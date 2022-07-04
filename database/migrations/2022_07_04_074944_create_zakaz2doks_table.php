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
        Schema::create('zakaz2doks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('zakazdok_id')->unsigned();
            $table->bigInteger('ichkitavardok_id')->unsigned();
            $table->string('clentra')->nullable();
            $table->string('adress')->nullable();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->float('soni')->nullable();
            $table->float('hajm')->nullable();
            $table->float('summa')->nullable();
            $table->float('summa2')->nullable();
            $table->string('chegirma')->nullable();
            $table->float('itog')->nullable();
            $table->timestamps();
            $table->foreign('zakazdok_id')->references('id')->on('zakazdoks')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ichkitavardok_id')->references('id')->on('ichkitavardoks')
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
        Schema::dropIfExists('zakaz2doks');
    }
};
