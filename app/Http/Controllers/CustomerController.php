<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{

    public function index()
{
    return view('customers.index', ['customer' => Customer::all()]);
}
    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request)
{
    Customer::updateOrCreate(['id' => $request->customer_id], $request->except('customer_id'));

    return redirect()->route('customers.index')->with('succès', 'Etudiant créé avec succès !!');
}



    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('succès', 'Etudiant supprimé avec succès!!');
    }
}
