@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Login</h2>
    <form method="POST" action="{{ route('login') }}" class="space-y-4">@csrf
        <div>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded px-3 py-2" required>
            @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <input type="password" name="password" placeholder="Password" class="w-full border rounded px-3 py-2" required>
        <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember"> Yaad rakho</label>
        <button class="w-full bg-indigo-600 text-white py-2 rounded">Login</button>
    </form>
</div>
@endsection
