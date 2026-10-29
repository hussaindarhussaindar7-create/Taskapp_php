<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private function own(Task $task): Task
    {
        abort_if($task->user_id !== auth()->id(), 403);
        return $task;
    }

    private function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ];
    }

    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create() { return view('tasks.form', ['task' => new Task]); }

    public function store(Request $request)
    {
        Task::create($request->validate($this->rules()) + ['user_id' => auth()->id()]);
        return redirect()->route('tasks.index')->with('ok', 'Task add ho gaya.');
    }

    public function edit(Task $task) { return view('tasks.form', ['task' => $this->own($task)]); }

    public function update(Request $request, Task $task)
    {
        $this->own($task)->update($request->validate($this->rules()));
        return redirect()->route('tasks.index')->with('ok', 'Task update ho gaya.');
    }

    public function toggle(Task $task)
    {
        $this->own($task)->update(['is_done' => !$task->is_done]);
        return back();
    }

    public function destroy(Task $task)
    {
        $this->own($task)->delete();
        return back()->with('ok', 'Task delete ho gaya.');
    }
}
