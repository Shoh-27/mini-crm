@extends('layouts.app')

@section('content')
    <h2>Contacts for {{ $customer->name }}</h2>

    <a href="{{ route('customers.contacts.create', $customer) }}" class="btn btn-primary mb-3">+ Add Contact</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th><th>Type</th><th>Notes</th><th>Date</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->type }}</td>
                <td>{{ $contact->notes }}</td>
                <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('customers.contacts.edit', [$customer, $contact]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('customers.contacts.destroy', [$customer, $contact]) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No contacts found</td></tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
