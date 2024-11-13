<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Customer */
class CustomerSmallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{
    $card = new CardResource($this->card);
    $billingAddress = new AddressResource($this->billingAddress);

    return [
        'number' => $card?->masked_number,
        'email' => $this->email,
        'billingFirstName' => $billingAddress?->first_name ,
        'billingLastName' => $billingAddress?->last_name,
    ];
}

}
