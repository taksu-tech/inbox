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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->string('id', 40)->primary();

            $table->string('owner_type');
            $table->string('owner_id');
            $table->index(['owner_type', 'owner_id']);

            // reference to the source of the inbox
            $table->string('source_type', 40)->nullable();
            $table->string('source_id', 40)->nullable();
            $table->index(['source_type', 'source_id']);

            $table->string('category')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // response in regards to the inbox
            $table->string('response', 50)->nullable();
            $table->string('response_url')->nullable();
            $table->dateTime('responded_at')->nullable();
            $table->dateTime('can_respond_until')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};
