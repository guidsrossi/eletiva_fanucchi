{{-- resources/views/dashboard.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-semibold">Bem‑vindo, {{ auth()->user()->name }}!</h2>
    <p class="mt-4">Use o menu superior para acessar as áreas administrativas.</p>
</x-layouts.app>