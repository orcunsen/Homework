<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class GetTransactionReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fromDate' => 'required|date_format:Y-m-d',
            'toDate' => 'required|date_format:Y-m-d|after_or_equal:fromDate',
            'merchant' => 'integer|min:1',
            'acquirer' => 'integer|min:1'
        ];
    }
}
