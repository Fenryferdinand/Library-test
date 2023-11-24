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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('author')->onDelete('cascade');
            $table->string('book_publisher')->nullable();
            $table->string('publish_year')->nullable();
            $table->text('book_synopsis')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
