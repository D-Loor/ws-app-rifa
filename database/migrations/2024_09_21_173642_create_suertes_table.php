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
        Schema::create('suertes', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('primera_suerte');
            $table->string('segunda_suerte');
            $table->string('tercera_suerte');
            $table->string('cuarta_suerte');
            $table->string('quinta_suerte');
            $table->string('sexta_suerte');
            $table->string('septima_suerte');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suertes');
    }
};
