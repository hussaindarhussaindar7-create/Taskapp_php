@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Register</h2>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">@csrf
        <div>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="w-full border rounded px-3 py-2" required>
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded px-3 py-2" required>
            @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <input type="password" name="password" placeholder="Password (min 6)" class="w-full border rounded px-3 py-2" required>
            @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <input type="password" name="password_confirmation" placeholder="Password dobara" class="w-full border rounded px-3 py-2" required>
        <button class="w-full bg-indigo-600 text-white py-2 rounded">Account banao</button>
    </form>
</div>
@endsection
