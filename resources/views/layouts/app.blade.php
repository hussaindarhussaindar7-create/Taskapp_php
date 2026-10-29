<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">
<nav class="bg-white shadow">
    <div class="max-w-4xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold text-indigo-600 text-lg">{{ config('app.name') }}</a>
        <div class="flex items-center gap-4 text-sm">
            @auth
                <a href="{{ route('tasks.index') }}" class="hover:text-indigo-600">Tasks</a>
                <span class="text-gray-500">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <button class="text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-3 py-1 rounded">Register</a>
            @endauth
        </div>
    </div>
</nav>
<main class="max-w-4xl mx-auto px-4 py-8">
    @if(session('ok'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('ok') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
