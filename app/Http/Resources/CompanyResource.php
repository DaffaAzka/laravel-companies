<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'contact_firstname' => $this->contact_firstname,
            'contact_lastname' => $this->contact_lastname,
            'contact_email' => $this->contact_email,
            'acquired_on' => $this->acquired_on,
            'costumer_status' => $this->customer_status,
            'total_customers' => $this->customers()->count(),
            'customers' => $this->whenLoaded('customers', function () {
                return $this->customers->map(function ($customer) {
                    return [
                        'id' => $customer->id,
                        'first_name' => $customer->first_name,
                        'last_name' => $customer->last_name,
                        'email' => $customer->email,
                        'phone' => $customer->phone,
                    ];
                });
            })
        ];
    }
}
