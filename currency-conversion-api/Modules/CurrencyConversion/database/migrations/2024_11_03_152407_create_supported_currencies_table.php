<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\CurrencyConversion\Models\SupportedCurrency;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(SupportedCurrency::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(SupportedCurrency::KEY)->unique();
            $table->string(SupportedCurrency::VALUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(SupportedCurrency::TABLE);
    }
};
