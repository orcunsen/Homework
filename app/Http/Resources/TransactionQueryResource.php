<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Transaction */
class TransactionQueryResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $transactions = $this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator
        ? $this->resource->getCollection()
        : $this->collection;

    return $transactions->map(fn (Transaction $model): array => [
        'fx' => ['merchant' => new FxResource($model->fx)],
        'customerInfo' => new CustomerSmallResource($model->customer),
        'merchant' => new MerchantResource($model->merchant),
        'ipn' => ['received' => $model->ipn,],
        'transaction' => ['merchant' => new TransactioSmallResource($model),],
        'acquirer' => new AcquirerResource($model->acquirer),
        'refundable' => $model->refundable,
    ])->all();
    }

    /**
     * Customize the pagination information for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param array                    $paginated
     * @param array                    $default
     *
     * @return array
     */
    public function paginationInformation($request, $paginated, $default)
    {
        $meta = $default['meta'];

        $default['next_page_url'] = $default['links']['next'];
        $default['prev_page_url'] = $default['links']['prev'];

        unset($default['meta'], $default['links'], $meta['links']);

        return $default + $meta;
    }
}
