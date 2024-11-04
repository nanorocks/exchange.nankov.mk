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
            'success' => true,
            'on_date' => now()->format('Y-m-d'),
            'data' => parent::toArray($request)
        ];
    }
}
