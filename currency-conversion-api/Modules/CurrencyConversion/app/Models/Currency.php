<?php

namespace Modules\CurrencyConversion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    public const TABLE = 'currencies';
    public const ID = 'id';
    public const DATE = 'date';
    public const JSON = 'json';

    protected $table = self::TABLE;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        self::DATE,
        self::JSON,
    ];
}
