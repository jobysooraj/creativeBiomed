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
            $table->string('name')->nullable(); 
            $table->string('company_address');
            $table->string('email'); 
            $table->string('phone'); 
            $table->string('location')->mullable();
            $table->string('logo_image')->mullable(); 
            $table->string('instagram_id')->mullable(); 
            $table->string('facebook_id')->mullable(); 
            $table->string('whatsapp_id')->nullable();
            $table->timestamps();
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
