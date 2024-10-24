<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    //
    use HasFactory;
    protected $fillable = ['company_name', 'contact_firstname', 'contact_lastname', 'contact_email', 'acquired_on', 'customer_status'];

    function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'company_id', 'id');
    }
}
