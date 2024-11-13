<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Transaction */
class TransactioBigResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'referenceNo' => $this->reference_no,
            'merchantId' => $this->merchant_id,
            'status' => $this->status,
            'channel' => $this->channel,
            'customData' => $this->custom_data,
            'chainId' => $this->chain_id,
            'agentInfoId' => $this->agent_info_id,
            'operation'  => $this->operation,
            'fxTransactionId'  => $this->fx_id,
            'updated_at'  => $this->updated_at,
            'created_at'  => $this->created_at,
            'id'  => $this->id,
            'acquirerTransactionId'  => $this->acquirer_transaction_id,
            'code'  => $this->code,
            'message'  => $this->message,
            'transactionId' => $this->transaction_id,
            'agent' => $this->agent,
        ];
    }
}
