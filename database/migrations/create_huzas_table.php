<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('huzas', function (Blueprint $t) {
            $t->id();
            $t->integer('ev');
            $t->integer('het');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('huzas');
    }
};
