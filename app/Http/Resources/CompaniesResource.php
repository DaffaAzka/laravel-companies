<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompaniesResource extends JsonResource
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
            'acquired_on' => $this->acquired_on,
            'customer_status' => $this->customer_status,
            'total_customers' => $this->customers()->count(),
            'customers' => $this->whenLoaded('customers', function () {
                return $this->customers->map(function ($customer) {
                    return [
                        'full_name' => $customer->first_name . " " . $customer->last_name,
                        'email' => $customer->email,
                        'phone' => $customer->phone,
                    ];
                });
            }),
        ];
    }
}
