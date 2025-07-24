{{-- resources/views/welcome.blade.php --}}
<x-layouts.guest>
    <div class="text-center space-y-6">
        <h1 class="text-4xl font-extrabold">Sistema de Eletivas</h1>
        <p class="text-lg">Inscreva‑se nas eletivas disponíveis da sua escola.</p>
        <a href="{{ route('form') }}" class="px-6 py-3 bg-green-600 text-white rounded shadow hover:bg-green-700">
            Fazer inscrição agora
        </a>
    </div>
</x-layouts.guest>