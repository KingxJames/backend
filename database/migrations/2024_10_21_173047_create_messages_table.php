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
            // $table->foreignId('message_category_id')->constrained('message_categories'); //we remove it since all functions of the app is using the api and some fuctions will not have message categories 
            $table->foreignId('sender_id')->constrained('users'); //unlink  the user until a login is implemented in the application
            $table->string('topic');
            $table->string('images')->nullable(); //check if we should change it to string
            $table->text('message');
            $table->string('location');
            $table->dateTime('date_sent');
            $table->boolean('is_archive')->nullable(); //That is allowed to have a null value. This make it optional
            $table->boolean('is_deleted')->nullable();//That is allowed to have a null value. This make it optional
            $table->boolean('is_forwarded')->nullable();//That is allowed to have a null value. This make it optional
            $table->enum('type', ['email', 'sms', 'notification']);
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
