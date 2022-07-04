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
        Schema::create('arxivdoks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userdok_id')->unsigned();
            $table->string('itogs')->nullable();
            $table->string('naqt')->nullable();
            $table->string('plastik')->nullable();
            $table->string('bank')->nullable();
            $table->float('karzs')->nullable();
            $table->timestamps();
            $table->foreign('userdok_id')->references('id')->on('userdoks')
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
        Schema::dropIfExists('arxivdoks');
    }
};
