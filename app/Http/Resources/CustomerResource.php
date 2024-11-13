<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Customer */
class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->resource != null) {
            $card = $this->card ? new CardResource($this->card) : null;
            $billingAddress = $this->billingAddress ? new AddressResource($this->billingAddress) : null;
            $shippingAddress = $this->shippingAddress ? new AddressResource($this->shippingAddress) : null;

            return [
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted_at' => $this->deleted_at,
                'number' => $card ? $card->masked_number : null,
                'expiryMonth' => $card ? $card->expiry_month : null,
                'expiryYear' => $card ? $card->expiry_year : null,
                'startMonth' => $card ? $card->start_month : null,
                'startYear' => $card ? $card->start_year : null,
                'issueNumber' => $card ? $card->issue_number : null,
                'email' => $this->email,
                'birthday' => $this->birthday,
                'gender' => $this->gender,
                'billingTitle' => $billingAddress ? $billingAddress->title : null,
                'billingFirstName' => $billingAddress ? $billingAddress->first_name : null,
                'billingLastName' => $billingAddress ? $billingAddress->last_name : null,
                'billingCompany' => $billingAddress ? $billingAddress->company : null,
                'billingAddress1' => $billingAddress ? $billingAddress->address1 : null,
                'billingAddress2' => $billingAddress ? $billingAddress->address2 : null,
                'billingCity' => $billingAddress ? $billingAddress->city : null,
                'billingState' => $billingAddress ? $billingAddress->state : null,
                'billingPostcode' => $billingAddress ? $billingAddress->postcode : null,
                'billingCountry' => $billingAddress ? $billingAddress->country : null,
                'billingPhone' => $billingAddress ? $billingAddress->phone : null,
                'billingFax' => $billingAddress ? $billingAddress->fax : null,
                'shippingTitle' => $shippingAddress ? $shippingAddress->title : null,
                'shippingFirstName' => $shippingAddress ? $shippingAddress->first_name : null,
                'shippingLastName' => $shippingAddress ? $shippingAddress->last_name : null,
                'shippingCompany' => $shippingAddress ? $shippingAddress->company : null,
                'shippingAddress1' => $shippingAddress ? $shippingAddress->address1 : null,
                'shippingAddress2' => $shippingAddress ? $shippingAddress->address2 : null,
                'shippingCity' => $shippingAddress ? $shippingAddress->city : null,
                'shippingState' => $shippingAddress ? $shippingAddress->state : null,
                'shippingPostcode' => $shippingAddress ? $shippingAddress->postcode : null,
                'shippingCountry' => $shippingAddress ? $shippingAddress->country : null,
                'shippingPhone' => $shippingAddress ? $shippingAddress->phone : null,
                'shippingFax' => $shippingAddress ? $shippingAddress->fax : null,
            ];
        }
        
        return [];
    }
}
