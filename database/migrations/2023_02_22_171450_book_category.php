<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps(); //esto crea dos columnas created_at y updated_at

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); // activo la eliminacion en cascada
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category'); //Todas las migraciones tendrán que tener 
        //implementada la funcionalidad necesaria para poder realizar los rollbacks necesarios.
    }
};
