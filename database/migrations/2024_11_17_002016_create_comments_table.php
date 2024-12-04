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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id'); // Використовує unsignedInteger
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable(); // Використовує unsignedInteger
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->text('comment');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
