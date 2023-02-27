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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('title');
            $table->string('author');
            $table->date('published_date');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->timestamps(); //esto crea dos columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');//Todas las migraciones tendrán que tener 
        //implementada la funcionalidad necesaria para poder realizar los rollbacks necesarios.
    }
};
