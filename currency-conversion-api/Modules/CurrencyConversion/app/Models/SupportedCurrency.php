<?php

namespace Modules\CurrencyConversion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CurrencyConversion\Database\Factories\SupportedCurrencyFactory;

class SupportedCurrency extends Model
{
    use HasFactory;

    public const TABLE = 'supported_currencies';
    public const ID = 'id';
    public const KEY = 'key';
    public const VALUE = 'value';

    protected $table = self::TABLE;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        self::KEY,
        self::VALUE
    ];

    // protected static function newFactory(): SupportedCurrencyFactory
    // {
    //     // return SupportedCurrencyFactory::new();
    // }
}
