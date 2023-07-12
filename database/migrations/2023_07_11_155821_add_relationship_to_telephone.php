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
        Schema::table('telephones', function (Blueprint $table) {
            $table->foreignId("structure_id")
                    ->constrained("structures")
                    ->onUpdate("restrict")
                    ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telephone', function (Blueprint $table) {
            //
        });
    }
};
