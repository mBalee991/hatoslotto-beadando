<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('huzott', function (Blueprint $t) {
            $t->id();
            $t->foreignId('huzasid')->constrained('huzas');
            $t->integer('szam');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('huzott');
    }
};
