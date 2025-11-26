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
        Schema::table('datos_sanitarios', function (Blueprint $table) {
            $table->string('nombre_dueño')->nullable()->after('senal_numero');
            $table->string('carnet_dueño_foto')->nullable()->after('nombre_dueño');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_sanitarios', function (Blueprint $table) {
            $table->dropColumn(['nombre_dueño', 'carnet_dueño_foto']);
        });
    }
};
