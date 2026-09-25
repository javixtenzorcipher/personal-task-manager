<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Get the search input
        $search = $request->input('search');

        // Get all tasks for the statistics
        $allTasks = Task::orderBy('due_date', 'asc')->get();

        // Get tasks for the task list
        $tasks = Task::query()
            ->when($search, function ($query, $search) {
                $query->where('task_name', 'like', '%' . $search . '%');
            })
            ->orderBy('due_date', 'asc')
            ->get();

        return view('tasks.index', compact('tasks', 'allTasks', 'search'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return response()->redirectTo('/tasks');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'required|date',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return response()->redirectTo('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return response()->redirectTo('/tasks');
    }
}