<?php

namespace Modules\CurrencyConversion\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyConversionPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Currency Conversions are synced successfully.',
            'on_date' => now(),
            'data' => parent::toArray($request)
        ];
    }
}
