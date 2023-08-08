<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumni_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('batch');
            $table->string('course')->nullable();
            $table->string('short_course')->nullable();
            $table->string('status');
            $table->string('civil_status');
            $table->string('connected');
            $table->string('nationality');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('street');
            $table->string('employer')->nullable();
            $table->string('doe')->nullable();
            $table->string('salary')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_information');
    }
};