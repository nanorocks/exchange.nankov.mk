<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;

class CurrencyConversionPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'source_currency' => 'required|string|exists:supported_currencies,key',
            'target_currency' => 'required|string|exists:supported_currencies,key',
            'value' => 'required|string|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): CurrencyConversionDto
    {
        $payload = $this->all();

        return new CurrencyConversionDto(
            $payload['source_currency'],
            $payload['target_currency'],
            $payload['value']
        );
    }
}
