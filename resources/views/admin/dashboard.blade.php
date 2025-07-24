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
</x-layouts.app>