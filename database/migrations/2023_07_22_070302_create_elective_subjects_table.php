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
        Schema::create('elective_subjects', function (Blueprint $table) {
            $table->Uuid('id')->primary();
            $table->foreignUuid('family_id')
                ->references('id')->on('families')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elective_subjects');
    }
};
