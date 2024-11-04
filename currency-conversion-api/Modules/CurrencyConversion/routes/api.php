<?php

use Illuminate\Support\Facades\Route;
use Modules\CurrencyConversion\Http\Controllers\CurrencyConversionActionController;
use Modules\CurrencyConversion\Http\Controllers\SupportedCurrencyExchangeActionController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
});

Route::post('/v1/exchange-rates', CurrencyConversionActionController::class);

Route::post('/v1/supported-exchange-rates', SupportedCurrencyExchangeActionController::class);
