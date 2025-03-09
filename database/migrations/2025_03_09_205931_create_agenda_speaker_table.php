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
        Schema::create('agenda_speaker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_agenda_id')->constrained()->onDelete('cascade');
            $table->foreignId('speaker_id')->constrained()->onDelete('cascade');
            $table->string('role')->nullable(); // e.g., 'Moderator', 'Panelist', 'Speaker'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_speaker');
    }
};
