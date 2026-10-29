@extends('layouts.app')
@section('content')
<div class="text-center py-16">
    <h1 class="text-4xl font-bold mb-4">Task Manager</h1>
    <p class="text-gray-600 mb-8">Apne tasks banao, track karo, complete karo.</p>
    @auth
        <a href="{{ route('tasks.index') }}" class="bg-indigo-600 text-white px-6 py-2 rounded">Meray Tasks</a>
    @else
        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-2 rounded">Shuru karo</a>
    @endauth
</div>
@endsection
