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
        Schema::create('concerts', function (Blueprint $table){
            $table->id();
            $table->foreignId('vendors_id');
            $table->foreignId('categories_id');
            $table->string('nama');
            $table->string('slug');
            $table->string('pict');
            $table->string('tanggal');
            $table->string('waktu');
            $table->integer('harga');
            $table->longText('terms');
            $table->string('tempat');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerts');
    }
};
