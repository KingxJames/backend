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
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report');
            $table->string('disposition');
            $table->string('case_number');
            $table->string('action');
            $table->string('location');
            $table->string('uploaded_by');
            $table->integer('frequency');
            $table->dateTime('incident_reoccured');
            $table->foreignId('incident_file_id')->constrained('incident_files');
            $table->foreignId('incident_status_id')->constrained('incident_statuses');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('campus_id')->constrained('campuses');
            $table->foreignId('building_id')->constrained('buildings');
            $table->string('incident_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
    }
};