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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year')->nullable();
            $table->string('author')->nullable();
            $table->text('summary')->nullable();
            $table->string('publisher');
            $table->integer('pageCount');
            $table->integer('readPage');
            $table->boolean('reading')->default(false);
            $table->timestamp('insertedAt')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            // Tambahkan index untuk kolom 'name' untuk pencarian efisien
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
