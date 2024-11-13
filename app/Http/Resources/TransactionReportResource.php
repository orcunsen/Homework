<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Transaction */
class TransactionReportResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $transactions = $this->collection;

        return $transactions->map(fn (Transaction $model): array => [
            'response' => [
                'total' => $model->total,
                'count' => $model->count,
                'currency' => $model->currency
            ]
        ])->all();
    }
}
