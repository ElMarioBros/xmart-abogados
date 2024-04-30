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
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('project_name');
            $table->string('form_type');
            $table->string('file_number')->unique();
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_address');
            $table->string('client_photo')->nullable();
            $table->string('defendant_name');
            $table->string('defendant_email')->nullable();
            $table->string('defendant_phone')->nullable();
            $table->string('defendant_address');
            $table->string('defendant_photo')->nullable();
            $table->string('payer_name');
            $table->string('payer_email')->nullable();
            $table->string('payer_phone')->nullable();
            $table->string('payer_address');
            $table->string('payer_photo')->nullable();
            $table->text('observations')->nullable();
            $table->string('law_firm_validation')->nullable();
            $table->string('drawer_number')->nullable();
            $table->string('satisfaction_level')->default(3);
            $table->string('honorarium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_cases');
    }
};
