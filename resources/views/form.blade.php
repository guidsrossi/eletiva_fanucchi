{{-- resources/views/form.blade.php --}}
<x-layouts.guest>
    <form method="POST" action="{{ route('form.store') }}" class="bg-white shadow rounded p-6 w-full max-w-xl space-y-4">
        @csrf
        <h2 class="text-2xl font-bold mb-2 text-center">Formulário de Inscrição</h2>

        <input name="full_name" placeholder="Nome completo" required class="w-full border p-2 rounded">

        <select name="class_id" required class="w-full border p-2 rounded">
            <option value="" disabled selected>Selecione a turma</option>
            @foreach ($classes as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <textarea name="life_project" rows="3" required class="w-full border p-2 rounded"
            placeholder="Qual é o seu projeto de vida?"></textarea>

        <p class="font-semibold">Escolha até 4 eletivas em ordem de prioridade</p>

        @for ($i = 1; $i <= 4; $i++)
            <select name="electives[]" class="w-full border p-2 rounded mb-2" {{ $i == 1 ? 'required' : '' }}>
                <option value="">{{ $i }}ª opção {{ $i == 1 ? '(obrigatória)' : '' }}</option>
                @foreach ($electives as $e)
                    <option value="{{ $e->id }}">{{ $e->name }}</option>
                @endforeach
            </select>
        @endfor

        <button class="w-full py-3 bg-green-600 text-white font-semibold rounded hover:bg-green-700">
            Enviar inscrição
        </button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('select[name="electives[]"]');

            function updateOptions() {
                const selectedValues = Array.from(selects).map(select => select.value).filter(Boolean);

                selects.forEach(select => {
                    const currentValue = select.value;
                    Array.from(select.options).forEach(option => {
                        if (option.value === "") return;

                        if (selectedValues.includes(option.value) && option.value !==
                            currentValue) {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                });
            }

            selects.forEach(select => {
                select.addEventListener('change', updateOptions);
            });

            updateOptions();
        });
    </script>
</x-layouts.guest>
