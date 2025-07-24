{{-- resources/views/admin/electives/edit.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Editar Eletiva</h2>
    <form method="POST" action="{{ route('electives.update', $elective) }}" class="max-w-md space-y-4">
        @csrf @method('PUT')
        <input name="name" value="{{ $elective->name }}" required class="w-full border p-2 rounded">
        <input name="seats" type="number" min="1" value="{{ $elective->seats }}" required
               class="w-full border p-2 rounded">
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Atualizar</button>
    </form>
</x-layouts.app>
