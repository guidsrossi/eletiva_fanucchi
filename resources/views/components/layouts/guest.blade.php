<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-green-200 to-blue-200">
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded shadow">{{ session('success') }}</div>
    @endif
    {{ $slot }}
</body>
</html>