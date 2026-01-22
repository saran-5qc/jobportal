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
        Schema::create('jobtable_models', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->foreignid('category_id')->references('id')->on('category_models')->onDelete('cascade');
            $table->foreignid('job_type_id')->references('id')->on('job_types_models')->onDelete('cascade');
            $table->foreignid('user_id')->references('id')->on('reg_models')->onDelete('cascade');
            $table->string('vacancy');
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualification')->nullable();
            $table->string('keywords')->nullable();
            $table->string('experience')->nullable();
            $table->string('company_name');
            $table->string('company_location');
            $table->string('company_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobtable_models');
    }
};
