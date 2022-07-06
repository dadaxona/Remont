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
        Schema::create('karzina2doks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userdok_id')->unsigned();
            $table->bigInteger('ichkitavardok_id')->unsigned();
            $table->string('clentra')->nullable();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->string('soni')->nullable();
            $table->string('hajm')->nullable();
            $table->string('summa')->nullable();
            $table->string('summa2')->nullable();
            $table->string('chegirma')->nullable();
            $table->string('itog')->nullable();
            $table->string('zakaz')->nullable();
            $table->timestamps();
            $table->foreign('userdok_id')->references('id')->on('userdoks')
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
        Schema::dropIfExists('karzina2doks');
    }
};
