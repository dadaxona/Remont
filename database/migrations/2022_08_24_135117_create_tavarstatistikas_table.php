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
        Schema::create('tavarstatistikas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ichkitavar_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('hajm')->nullable();
            $table->integer('summa')->nullable();
            $table->timestamps();
            $table->foreign('ichkitavar_id')->references('id')->on('ichkitavars')
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
        Schema::dropIfExists('tavarstatistikas');
    }
};
