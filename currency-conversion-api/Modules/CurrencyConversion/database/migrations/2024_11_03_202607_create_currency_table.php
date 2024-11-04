<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\CurrencyConversion\Models\Currency;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Currency::TABLE, function (Blueprint $table) {
            $table->id();
            $table->timestamp(Currency::DATE);
            $table->json(Currency::JSON);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Currency::TABLE);
    }
};
