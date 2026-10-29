@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Meray Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">+ Naya Task</a>
</div>
<div class="bg-white rounded shadow divide-y">
    @forelse($tasks as $task)
    <div class="p-4 flex justify-between items-center">
        <div>
            <div class="font-medium {{ $task->is_done ? 'line-through text-gray-400' : '' }}">{{ $task->title }}</div>
            @if($task->description)<div class="text-sm text-gray-500">{{ $task->description }}</div>@endif
            @if($task->due_date)<div class="text-xs text-gray-400">Due: {{ $task->due_date->format('d M Y') }}</div>@endif
        </div>
        <div class="flex items-center gap-3 text-sm">
            <form method="POST" action="{{ route('tasks.toggle', $task) }}">@csrf @method('PATCH')
                <button class="text-green-600 hover:underline">{{ $task->is_done ? 'Undo' : 'Done' }}</button>
            </form>
            <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:underline">Edit</a>
            <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Delete karna hai?')">@csrf @method('DELETE')
                <button class="text-red-600 hover:underline">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <p class="p-6 text-center text-gray-500">Abhi koi task nahi hai.</p>
    @endforelse
</div>
<div class="mt-4">{{ $tasks->links() }}</div>
@endsection
