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
        Schema::create('settings', function (Blueprint $table) {

            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->integer('phone_1_country_code_id')->nullable();
            // $table->foreignId('phone_1_country_code_id')->nullable()->constrained('country_codes')->nullOnDelete();
            $table->string('phone_1')->nullable();
            // $table->foreignId('phone_2_country_code_id')->nullable()->constrained('country_codes')->nullOnDelete();
            $table->integer('phone_2_country_code_id')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('street')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();


            $table->foreign('phone_1_country_code_id')
                ->references('id')
                ->on('country_codes')
                ->nullOnDelete();

            $table->foreign('phone_2_country_code_id')
                ->references('id')
                ->on('country_codes')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
