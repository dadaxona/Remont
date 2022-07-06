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
        Schema::create('updatetavrdoks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ichkitavardok_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->string('hajm')->nullable();
            $table->string('summa')->nullable();
            $table->string('summa2')->nullable();
            $table->string('summa3')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('updatetavrdoks');
    }
};
