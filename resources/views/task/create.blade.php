@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Task for {{ $customer->name }}</h1>
        <form action="{{ route('customers.tasks.store', $customer) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

