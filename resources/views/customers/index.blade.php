@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Customers</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Add Customer</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('customers.contacts.index', $customer) }}" class="btn btn-sm btn-secondary">Contacts</a>
                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No customers found</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $customers->links() }}
@endsection

