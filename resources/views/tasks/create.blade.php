<a  href="{{ route('tasks.index') }}">Voltar</a>

<h1>Nova Tarefa</h1>

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <label for="titulo">Tarefa:</label><br>
    <input type="text" name="titulo" placeholder="Título"><br><br>
    <label for="prioridade">Prioridade:</label><br>
    <select name="prioridade" id="">
        @foreach(\App\Models\Task::PRIORIDADES as $valor => $label)
            <option value="{{ $valor }}" {{ old('prioridade', $task->prioridade ?? '') == $valor ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select><br><br>
    <label for="data_limite">Data:</label><br>
    <input type="date" name="data_limite"><br><br>
    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao"></textarea><br><br>

    <button type="submit">Salvar</button>
</form>
