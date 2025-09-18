@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task for {{ $customer->name }}</h1>
        <form action="{{ route('customers.tasks.update', [$customer, $task]) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

