<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tron_trc20', function (Blueprint $table) {
            $table->id();
            $table->string('address')->unique();
            $table->string('name');
            $table->string('symbol');
            $table->unsignedTinyInteger('decimals');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tron_trc20');
    }
};
