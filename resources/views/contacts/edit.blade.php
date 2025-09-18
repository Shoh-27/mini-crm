@extends('layouts.app')

@section('content')
    <h2>Edit Contact for {{ $customer->name }}</h2>

    <form action="{{ route('customers.contacts.update', [$customer, $contact]) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $contact->type) }}" required>
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ old('notes', $contact->notes) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('customers.contacts.index', $customer) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

