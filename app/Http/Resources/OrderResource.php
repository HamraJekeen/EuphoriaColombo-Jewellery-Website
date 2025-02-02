<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user, // You can replace with a UserResource if needed
            'grand_total' => $this->grand_total,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'currency' => $this->currency,
            'shipping_amount' => $this->shipping_amount,
            'shipping_method' => $this->shipping_method,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'items' => OrderItemResource::collection($this->whenLoaded('items')), // Ensure OrderItemResource exists
            'address' => new AddressResource($this->whenLoaded('address')), // Ensure AddressResource exists
        ];
    }
}
