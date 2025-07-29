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
        Schema::create('subcontractors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('specialization');
            $table->string('license_number')->nullable();
            $table->string('insurance_certificate')->nullable();
            $table->integer('experience_years');
            $table->string('availability_status');
            $table->string('payment_method');
            $table->enum('contract_signed', ['Yes', 'No']);
            $table->text('office_address');
            $table->text('service_areas')->nullable();
            $table->text('bank_details')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcontractors');
    }
};
