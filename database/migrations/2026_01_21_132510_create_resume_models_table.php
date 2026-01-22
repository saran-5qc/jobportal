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
        Schema::create('resume_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jobtable_models_id')->constrained('jobtable_models')->onDelete('cascade')->nullable();
            $table->foreignId('user_id')->constrained('reg_models')->onDelete('cascade')->nullable();
            $table->foreignId('registration_models_id')->constrained('reg_models')->onDelete('cascade')->nullable();
            $table->timestamp('applied_date')->nullable();
            $table->string('name',100);
            $table->string('phone');
            $table->string('email',100);
            $table->string('Summary');
            $table->string('qualification');
            $table->string('skills');
            $table->string('projects');
            $table->string('Fathers_name');
            $table->string('passport',100);
            $table->date('date_of_birth');
            $table->string('language_known');
            $table->string('hobbies');
            $table->string('address');
            $table->string('image',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_models');
    }
};
