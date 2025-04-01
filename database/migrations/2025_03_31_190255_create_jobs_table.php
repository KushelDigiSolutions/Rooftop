<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('mobile_number', 12);
            $table->string('email')->unique();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip_code', 10);
            $table->timestamps();
    
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('customers');
    }
    
};
