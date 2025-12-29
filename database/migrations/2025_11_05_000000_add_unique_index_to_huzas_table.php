<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('huzas', function (Blueprint $table) {
            $table->unique(['ev', 'het'], 'huzas_ev_het_unique');
        });
    }

    public function down(): void
    {
        Schema::table('huzas', function (Blueprint $table) {
            $table->dropUnique('huzas_ev_het_unique');
        });
    }
};
