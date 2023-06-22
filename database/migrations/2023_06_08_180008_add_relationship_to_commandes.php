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
        Schema::table('commandes', function (Blueprint $table) {
             $table->foreignId('produit_id')
                    ->constrained('produits')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
                    
            $table->foreignId('custumer_id')
                    ->constrained('custumers')
                    ->onUpdate('restrict')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {});
    }
};
