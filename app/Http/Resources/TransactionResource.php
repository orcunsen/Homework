<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Transaction */
class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */ 
    public function toArray($request): array
    {
        if ($this->resource != null) {
            return [
                'fx' => ['merchant' => new FxResource($this->resource->fx),],
                'customerInfo' => new CustomerResource($this->resource->customer),
                'merchant' => new MerchantSmallResource($this->resource->merchant),
                'ipn' => ['received' => $this->resource->ipn,],
                'transaction' => ['merchant' => new TransactioBigResource($this->resource)],
                'acquirer' => new AcquirerResource($this->resource->acquirer),
            ];
        }

        return [];
    }
}
