@extends('layouts.app')

@section('content')
    <h2>Customer Details</h2>
    <div class="card p-3">
        <h4>{{ $customer->name }}</h4>
        <p><b>Email:</b> {{ $customer->email }}</p>
        <p><b>Phone:</b> {{ $customer->phone }}</p>
        <p><b>Address:</b> {{ $customer->address }}</p>
    </div>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection

