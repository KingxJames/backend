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
        Schema::create('user_campuses', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key column 'id'
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('campus_id')->constrained('campuses');
            $table->boolean('primary_campus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_campuses');
    }
};
