<x-app-layout>
<div class="flex flex-col items-center mt-6">
    <div>
        <a class="p-2 bg-blue-500 text-white rounded-md" href="{{ route('tasks.index') }}">Voltar</a>
        <div class="mt-6 flex items-center flex-col">
            <div>
                <div class="bg-blue-500 border-t border-l border-r border-black p-2 text-white">
                    <h1>Editar tarefa</h1>
                </div>
                <div class="bg-white px-12 py-8 border border-black">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="titulo">Tarefa:</label><br>
                        <input type="text" name="titulo" value="{{ $task->titulo }}" maxlength="24"><br><br>
                        <label for="prioridade">Prioridade:</label><br>
                        <select name="prioridade" id="">
                            @foreach(\App\Models\Task::PRIORIDADES as $valor => $label)
                                <option value="{{ $valor }}" {{ old('prioridade', $task->prioridade ?? '') == $valor ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select><br><br>
                        <label for="data_limite">Data:</label><br>
                        <input type="date" name="data_limite" value="{{ $task->data_limite }}"><br><br>
                        <label for="descricao">Descrição:</label><br>
                        <div class="w-64">
                            <textarea id="descricao" class="resize-none h-36" name="descricao" maxlength="100">{{ $task->descricao }}</textarea><br>
                            <p id="contador" class="text-right"></p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button class="bg-green-500 px-4 py-2 rounded-2xl text-white" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/tasks.js') }}"></script>

</x-app-layout>
