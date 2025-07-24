{{-- resources/views/admin/electives/index.blade.php --}}
<x-layouts.app>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Eletivas</h2>
        <a href="{{ route('electives.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nova eletiva
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-100 text-left">
        <tr>
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Vagas totais</th>
            <th class="px-4 py-2">Vagas ocupadas</th>
            <th class="px-4 py-2 w-32"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($electives as $e)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $e->name }}</td>
                <td class="px-4 py-2">{{ $e->seats }}</td>
                <td class="px-4 py-2">{{ $e->seats - $e->seatsLeft() }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('electives.edit', $e) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form method="POST" action="{{ route('electives.destroy', $e) }}" class="inline"
                          onsubmit="return confirm('Remover eletiva?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $electives->links() }}</div>
</x-layouts.app>