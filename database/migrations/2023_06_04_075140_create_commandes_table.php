<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->integer("excess")->nullable();
            $table->string("note")->nullable();
            $table->string("delete");
            $table->string("code")->unique();
            $table->boolean("pay");
            $table->boolean("completed");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
