<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomersResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
//            'company_id' => $this->company_id,
            'company' => $this->whenLoaded('company', function () {
                return [
                    'company_name' => $this->company->company_name,
                    'contact_full_name' => $this->company->contact_firstname . " " .  $this->company->contact_lastname,
                    'contact_email' => $this->company->contact_email,
                ];
            })
        ];
    }
}
