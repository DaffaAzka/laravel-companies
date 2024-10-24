<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompaniesResource;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $company_all = Company::all();
//        return response()->json($company_all);
        return CompaniesResource::collection($company_all->loadMissing('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'company_name' => 'required|max:255',
            'contact_firstname' => 'required',
            'contact_lastname' => 'required',
            'contact_email' => 'required',
            'acquired_on' => 'required',
            'customer_status' => 'required',
        ]);

        $company = Company::create($request->all());
        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $company = Company::findOrFail($id);
        return new CompanyResource($company->loadMissing('customers'));
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
        //
//        $request->validate([
//            'company_name' => 'required|max:255',
//            'contact_firstname' => 'required',
//            'contact_lastname' => 'required',
//            'contact_email' => 'required',
//            'acquired_on' => 'required',
//            'customer_status' => 'required',
//        ]);

//        dd("Enter the updates");
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $company = Company::findOrFail($id);
        $company->delete();
        return new CompanyResource($company);
    }
}
