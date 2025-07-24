{{-- resources/views/admin/classes/create.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Nova Turma</h2>
    <form method="POST" action="{{ route('classes.store') }}" class="max-w-md space-y-4">
        @csrf
        <input name="name" placeholder="Nome da turma" required class="w-full border p-2 rounded">
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
    </form>
</x-layouts.app>