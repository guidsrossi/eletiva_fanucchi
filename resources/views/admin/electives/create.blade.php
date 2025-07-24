{{-- resources/views/admin/electives/create.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Nova Eletiva</h2>
    <form method="POST" action="{{ route('electives.store') }}" class="max-w-md space-y-4">
        @csrf
        <input name="name" placeholder="Nome da eletiva" required class="w-full border p-2 rounded">
        <input name="seats" type="number" min="1" value="40" required class="w-full border p-2 rounded"
               placeholder="Número de vagas">
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
    </form>
</x-layouts.app>
