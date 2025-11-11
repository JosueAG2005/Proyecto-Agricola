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
        Schema::create('ganados', function (Blueprint $table) {
    $table->id();
    $table->string('nombre'); // Nombre o identificación del animal
    $table->enum('tipo', ['Vaca', 'Toro', 'Ternero', 'Novillo', 'Becerra'])->default('Vaca');
    $table->integer('edad')->nullable(); // en meses o años
    $table->decimal('peso', 8, 2)->nullable(); // en kilogramos
    $table->enum('sexo', ['Macho', 'Hembra'])->nullable();
    $table->text('descripcion')->nullable();
    $table->decimal('precio', 10, 2)->nullable();
    $table->string('imagen')->nullable(); // ruta o nombre del archivo
    $table->foreignId('categoria_id')
          ->constrained('categorias')
          ->onDelete('cascade');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganados');
    }
};
