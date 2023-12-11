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
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('type')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('status');
            $table->dateTime('published_at')->nullable();
            $table->dateTime('can_respond_until')->nullable();
            $table->boolean('is_respond_required')->default(true);
            $table->boolean('is_signature_required')->default(true);
            $table->json('respond_options')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcasts');
    }
};
