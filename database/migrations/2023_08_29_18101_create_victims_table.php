<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ipv4');
            $table->string('owner', 256);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
