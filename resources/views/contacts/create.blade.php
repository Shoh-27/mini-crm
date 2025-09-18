@extends('layouts.app')

@section('content')
    <h2>Add Contact for {{ $customer->name }}</h2>

    <form action="{{ route('customers.contacts.store', $customer) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Type (Call, Meeting, Email...)</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}" required>
            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('customers.contacts.index', $customer) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

