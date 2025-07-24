<x-layouts.guest>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="text-center space-y-6 bg-white/70 px-8 py-10 rounded shadow max-w-md w-full">
            <h1 class="text-4xl font-extrabold text-gray-900">Sistema de Eletivas</h1>
            <p class="text-lg text-gray-700">Inscreva‑se nas eletivas disponíveis da sua escola.</p>
            <a href="{{ route('form') }}" class="inline-block px-6 py-3 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
                Fazer inscrição agora
            </a>
        </div>
    </div>
</x-layouts.guest>