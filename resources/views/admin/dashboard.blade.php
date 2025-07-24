{{-- resources/views/admin/dashboard.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Painel Administrativo</h2>

    <div class="grid md:grid-cols-3 gap-6">
        <a href="{{ route('classes.index') }}" class="bg-white p-6 rounded shadow hover:bg-gray-50">
            <h3 class="text-lg font-semibold">Turmas</h3>
            <p class="text-gray-600 mt-2">{{ \App\Models\ClassModel::count() }} cadastradas</p>
        </a>

        <a href="{{ route('electives.index') }}" class="bg-white p-6 rounded shadow hover:bg-gray-50">
            <h3 class="text-lg font-semibold">Eletivas</h3>
            <p class="text-gray-600 mt-2">{{ \App\Models\Elective::count() }} cadastradas</p>
        </a>

        <a href="{{ route('reports') }}" class="bg-white p-6 rounded shadow hover:bg-gray-50">
            <h3 class="text-lg font-semibold">Relatórios</h3>
            <p class="text-gray-600 mt-2">Ver estatísticas</p>
        </a>
    </div>

    <div class="mt-10 bg-white rounded shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Gerenciar Inscrições</h2>

        <form method="POST" action="{{ route('admin.clearAll') }}"
            onsubmit="return confirm('Deseja realmente apagar TODAS as inscrições?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">🗑️ Limpar todas as
                inscrições</button>
        </form>

        <hr class="my-6">

        <form method="POST" action="{{ route('admin.clearElective', ['elective' => 0]) }}" id="clearElectiveForm"
            onsubmit="return confirm('Deseja remover as inscrições da eletiva selecionada?')">
            @csrf
            @method('DELETE')
            <label class="block mb-2 font-medium">Selecionar Eletiva:</label>
            <select name="elective_id" id="eletivaSelect" class="border p-2 rounded w-full max-w-xs inline-block"
                required>
                <option value="" disabled selected>-- Escolha uma eletiva --</option>
                @foreach (\App\Models\Elective::orderBy('name')->get() as $e)
                    <option value="{{ $e->id }}">{{ $e->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 ml-2">
                🧹 Limpar eletiva
            </button>
        </form>
    </div>

    <script>
        document.getElementById('clearElectiveForm').addEventListener('submit', function(e) {
            const id = document.getElementById('eletivaSelect').value;
            this.action = this.action.replace('/0', '/' + id);
        });
    </script>
</x-layouts.app>
