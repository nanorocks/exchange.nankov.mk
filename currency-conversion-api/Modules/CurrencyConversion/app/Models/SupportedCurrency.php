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
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    protected $table = self::TABLE;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        self::KEY,
        self::VALUE
    ];

    protected $hidden = [
        self::CREATED_AT,
        self::UPDATED_AT
    ];
}
