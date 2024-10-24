<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomersResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $customer_all = Customer::all();
        return CustomersResource::collection($customer_all->loadMissing(['company']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required'
        ]);

        $customer = Customer::create($request->all());
        return new CustomerResource($customer->loadMissing(['company']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $customer = Customer::findOrFail($id);
        return new CustomerResource($customer->loadMissing(['company']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        $request->validate([
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'email' => 'required',
//            'phone' => 'required',
//            'company_id' => 'required'
//        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return new CustomerResource($customer->loadMissing(['company']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return new CustomerResource($customer->loadMissing(['company']));
    }
}
