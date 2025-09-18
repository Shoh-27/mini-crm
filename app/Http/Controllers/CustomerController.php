<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $query = Customer::query();

        if (!auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        $customers = $query->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateCustomer($request);
        $validated['user_id'] = auth()->id();

        Customer::create($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        $this->authorizeAccess($customer);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $this->authorizeAccess($customer);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $this->authorizeAccess($customer);

        $validated = $this->validateCustomer($request, $customer->id);
        $customer->update($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $this->authorizeAccess($customer);
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

    /**
     * Validation rules
     */
    protected function validateCustomer(Request $request, $ignoreId = null)
    {
        return $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:customers,email,' . $ignoreId,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);
    }

    /**
     * Authorize user access
     */
    protected function authorizeAccess(Customer $customer)
    {
        if (!auth()->user()->isAdmin() && $customer->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
