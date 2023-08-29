<?php

use App\Models\Attacker;
use App\Models\Victim;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->dateTime('detection_date');
            $table->dateTime('group_notice_date');
            $table->dateTime('zav_sector_notice_date');
            $table->foreignIdFor(Attacker::class)->constrained()->onDelete("cascade");
            $table->foreignIdFor(Victim::class)->constrained()->onDelete("cascade");
            $table->boolean('is_closed')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
