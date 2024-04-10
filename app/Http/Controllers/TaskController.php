<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'created_at'); // デフォルトは作成日でソート
        $order = $request->query('order', 'asc'); // デフォルトは昇順

        // ソートパラメータに基づいてタスクを取得
        $tasks = Task::orderBy($sort, $order)->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
    
        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully');
    }
}
