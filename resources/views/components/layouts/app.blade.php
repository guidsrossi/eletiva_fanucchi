<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 antialiased">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <h1 class="font-bold text-lg">
                <a href="{{ route('admin') }}">Painel Admin</a>
            </h1>
            <nav class="space-x-6 hidden md:flex">
                <a href="{{ route('classes.index') }}" class="hover:underline">Turmas</a>
                <a href="{{ route('electives.index') }}" class="hover:underline">Eletivas</a>
                <a href="{{ route('reports') }}" class="hover:underline">Relatórios</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-600 hover:underline">Sair</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            {{ $slot }}
        </div>
    </main>
</body>
</html>