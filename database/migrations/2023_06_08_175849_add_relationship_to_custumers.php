<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('custumers', function (Blueprint $table) {
            $table->foreignId('structure_id')
                    ->constrained('structures')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('custumers', function (Blueprint $table) {});
    }
};
