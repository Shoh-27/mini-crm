<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Customer $customer)
    {
        $contacts = $customer->contacts()->latest()->get();
        return view('contacts.index', compact('customer', 'contacts'));
    }

    public function create(Customer $customer)
    {
        return view('contacts.create', compact('customer'));
    }

    public function store(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:100',
            'notes' => 'nullable|string',
        ]);

        $customer->contacts()->create($validated);

        return redirect()->route('customers.contacts.index', $customer)
            ->with('success', 'Contact added successfully.');
    }

    public function edit(Customer $customer, Contact $contact)
    {
        return view('contacts.edit', compact('customer', 'contact'));
    }

    public function update(Request $request, Customer $customer, Contact $contact)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:100',
            'notes' => 'nullable|string',
        ]);

        $contact->update($validated);

        return redirect()->route('customers.contacts.index', $customer)
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Customer $customer, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('customers.contacts.index', $customer)
            ->with('success', 'Contact deleted successfully.');
    }
}
