<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_visits', function (Blueprint $table) {
            $table->id();

            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('page_url')->nullable();
            $table->string('page_name')->nullable();

            $table->timestamps();

            $table->index('ip_address');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_visits');
    }
};