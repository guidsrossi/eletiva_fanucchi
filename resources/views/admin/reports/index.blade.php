<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Relatórios de Inscrições</h2>

    <div class="mb-6">
        <a href="{{ route('reports.export') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
            Exportar Excel
        </a>
    </div>

    <h3 class="text-xl font-semibold mb-2">Inscrições por Eletiva e Prioridade</h3>
    <table class="w-full mb-8 bg-white shadow rounded text-center">
        <thead class="bg-gray-100">
        <tr>
            <th class="text-left px-4 py-2">Eletiva</th>
            <th>P1</th>
            <th>P2</th>
            <th>P3</th>
            <th>P4</th>
        </tr>
        </thead>
        <tbody>
        @foreach($porEletiva as $name => $rows)
            <tr class="border-t">
                <td class="text-left px-4 py-2 font-medium">{{ $name }}</td>
                @for($i=1;$i<=4;$i++)
                    @php $row = $rows->firstWhere('priority', $i); @endphp
                    <td>{{ $row->total ?? 0 }}</td>
                @endfor
            </tr>
        @endforeach
        </tbody>
    </table>

    <h3 class="text-xl font-semibold mb-2">Inscrições por Turma</h3>
    @foreach($porTurma as $turma => $choices)
        <div class="mb-4">
            <h4 class="font-bold">{{ $turma }}</h4>
            <ul class="list-disc ml-6 text-sm">
                @foreach($choices->groupBy('elective.name') as $eletiva => $grupo)
                    <li>{{ $eletiva }} – {{ $grupo->count() }} aluno(s)</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-layouts.app>