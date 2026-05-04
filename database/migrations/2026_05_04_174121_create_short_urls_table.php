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
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            
            $table->text('original_url'); 
            $table->string('short_code', 10)->unique()->index();
            $table->timestamps();
            
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id')->index();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
