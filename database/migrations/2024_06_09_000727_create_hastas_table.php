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
        Schema::create('hastas', function (Blueprint $table) {
            $table->id();
            $table->string('adi');
            $table->string('soyadi');
            $table->string('cinsiyet');
            $table->date('dogum_tarihi');
            $table->string('telefon')->nullable();
            $table->string('adres')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('sgk')->nullable();
            $table->text('tibbi_gecmis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hastas');
    }
};
