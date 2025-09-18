@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Customers</h1>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">+ New Customer</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email / Phone</th>
                <th>Company</th>
                <th>Contacts</th>
                <th>Tasks</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>
                        <div><strong>Email:</strong> {{ $customer->email }}</div>
                        <div><strong>Phone:</strong> {{ $customer->phone }}</div>
                    </td>
                    <td>{{ $customer->company }}</td>
                    <td>
                        {{ $customer->contacts->count() }}
                        <a href="{{ route('customers.contacts.index', $customer) }}" class="btn btn-sm btn-outline-info ms-2">View</a>
                    </td>
                    <td>
                        <span class="badge bg-warning">
                            Pending: {{ $customer->tasks->where('status', 'pending')->count() }}
                        </span>
                        <span class="badge bg-success">
                            Done: {{ $customer->tasks->where('status', 'done')->count() }}
                        </span>
                        <a href="{{ route('customers.tasks.index', $customer) }}" class="btn btn-sm btn-outline-info ms-2">View</a>
                    </td>
                    <td>
                        <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this customer?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No customers found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
