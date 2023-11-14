<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->unsignedBigInteger('bibliotecaria_id')->nullable();
            $table->foreign('bibliotecaria_id')->references('id')->on('bibliotecarias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            //
        });
    }
};
