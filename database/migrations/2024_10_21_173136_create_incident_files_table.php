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
        Schema::create('incident_files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->text('comment')->nullable();
            // $table->timestamp('created_at')->nullable();
            $table->foreignId('message_id')->constrained('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_files');
    }
};
