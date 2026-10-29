@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ $task->exists ? 'Task Edit' : 'Naya Task' }}</h2>
    <form method="POST" action="{{ $task->exists ? route('tasks.update', $task) : route('tasks.store') }}" class="space-y-4">
        @csrf
        @if($task->exists) @method('PUT') @endif
        <div>
            <input name="title" value="{{ old('title', $task->title) }}" placeholder="Title" class="w-full border rounded px-3 py-2" required>
            @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <textarea name="description" rows="3" placeholder="Description" class="w-full border rounded px-3 py-2">{{ old('description', $task->description) }}</textarea>
        <input type="date" name="due_date" value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2">
        <div class="flex gap-2">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
