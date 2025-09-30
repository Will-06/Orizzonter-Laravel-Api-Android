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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('Orizzonte');
            $table->string('default_language')->default('es');
            $table->text('terms_of_service_content')->nullable();
            $table->string('terms_of_service_version')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('app_phone_number')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
