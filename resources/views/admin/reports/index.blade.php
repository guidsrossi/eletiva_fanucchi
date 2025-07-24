{{-- resources/views/admin/reports/index.blade.php --}}
<x-layouts.app>
    <h2 class="text-2xl font-bold mb-6">Relatório por Eletiva e Prioridade</h2>

    <table class="w-full mb-10 bg-white shadow rounded text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Eletiva</th>
                <th class="px-4 py-2">P1</th>
                <th class="px-4 py-2">P2</th>
                <th class="px-4 py-2">P3</th>
                <th class="px-4 py-2">P4</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data->groupBy('elective_id') as $rows)
            <tr class="border-t">
                <td class="px-4 py-2 text-left">{{ $rows->first()->elective->name }}</td>
                @for($p=1;$p<=4;$p++)
                    @php $row = $rows->firstWhere('priority',$p); @endphp
                    <td class="px-4 py-2">
                        {{ $row->total ?? 0 }}
                    </td>
                @endfor
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-bold mb-6">Relatório por Turma</h2>
    @foreach($byClass as $className => $choices)
        <div class="mb-6">
            <h3 class="font-semibold text-lg">{{ $className }}</h3>
            <ul class="list-disc ml-6">
                @foreach($choices->groupBy('elective.name') as $eName => $c)
                    <li>{{ $eName }} – {{ $c->count() }} inscrições</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-layouts.app>