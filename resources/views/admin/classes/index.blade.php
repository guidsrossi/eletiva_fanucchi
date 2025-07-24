{{-- resources/views/admin/classes/index.blade.php --}}
<x-layouts.app>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Turmas</h2>
        <a href="{{ route('classes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nova turma
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2 w-32"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($classes as $c)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $c->name }}</td>
                <td class="px-4 py-2 space-x-2 text-right">
                    <a href="{{ route('classes.edit', $c) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form method="POST" action="{{ route('classes.destroy', $c) }}" class="inline"
                          onsubmit="return confirm('Remover turma?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $classes->links() }}</div>
</x-layouts.app>