<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('attackers', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ipv4');
            $table->string('type', 256);
            $table->string('description', 1024);
            $table->string('country', 256);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attackers');
    }
};
