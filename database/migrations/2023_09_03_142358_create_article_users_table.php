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
        Schema::create('article_users', function (Blueprint $table) {
            $table->id();
            $table->string("creator", 50);
            $table->string("title", 200);
            $table->string("category", 50);
            $table->string("description", 500);
            $table->text("content");
            $table->text('file')->nullable();
            $table->integer("id_user");
            $table->integer("statusArticle");
            $table->dateTime("published", $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_users');
    }
};
