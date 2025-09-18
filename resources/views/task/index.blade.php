@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks for {{ $customer->name }}</h1>
        <a href="{{ route('customers.tasks.create', $customer) }}" class="btn btn-primary mb-3">New Task</a>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                    <span class="badge bg-{{ $task->status == 'done' ? 'success' : 'warning' }}">
                        {{ ucfirst($task->status) }}
                    </span>
                    </td>
                    <td>
                        <a href="{{ route('customers.tasks.edit', [$customer, $task]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.tasks.destroy', [$customer, $task]) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete task?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $tasks->links() }}
    </div>
@endsection

