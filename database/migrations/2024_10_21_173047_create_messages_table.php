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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable(); // Optional user field (sender's name, string format)
            // $table->foreignId('sender_id')->constrained('users')->nullable(); //unlink  the user until a login is implemented in the application
            $table->string('sender')->nullable();
            // $table->string('topic')->nullable();
            // $table->string('images')->nullable(); //check if we should change it to string
            $table->text('text')->nullable();
            // $table->string('location')->nullable();;
            // $table->dateTime('date_sent')->nullable();
            // $table->boolean('is_archive')->nullable(); //That is allowed to have a null value. This make it optional
            // $table->boolean('is_deleted')->nullable();//That is allowed to have a null value. This make it optional
            // $table->boolean('is_forwarded')->nullable();//That is allowed to have a null value. This make it optional
            // $table->enum('type', ['email', 'sms', 'notification'])->nullable();
            $table->timestamp('timestamp')->nullable(); // Use a proper timestamp column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
