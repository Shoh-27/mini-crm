<?php

// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Customer;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index(Customer $customer) {
        $tasks = $customer->tasks()->latest()->paginate(10);
        return view('tasks.index', compact('customer', 'tasks'));
    }

    public function create(Customer $customer) {
        return view('tasks.create', compact('customer'));
    }

    public function store(Request $request, Customer $customer) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,done',
        ]);

        $customer->tasks()->create($validated);

        return redirect()->route('tasks.index', $customer)->with('success', 'Task added successfully.');
    }

    public function edit(Customer $customer, Task $task) {
        return view('tasks.edit', compact('customer', 'task'));
    }

    public function update(Request $request, Customer $customer, Task $task) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,done',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index', $customer)->with('success', 'Task updated successfully.');
    }

    public function destroy(Customer $customer, Task $task) {
        $task->delete();
        return redirect()->route('tasks.index', $customer)->with('success', 'Task deleted successfully.');
    }
}

?>
