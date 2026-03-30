@extends('layouts.app')

@section('content')

<a class="p-2 bg-blue-500 text-white rounded-md" href="{{ route('tasks.index') }}">Voltar</a>

<div class="mt-6 flex items-center flex-col">
    <div>
        <div class="bg-blue-500 border-t border-l border-r border-black p-2 text-white">
            <h1>Nova Tarefa</h1>
        </div>
        <div class="bg-white px-12 py-8 border border-black">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <label for="titulo">Tarefa:</label><br>
                <input type="text" name="titulo" placeholder="Nova programação"><br><br>
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
                <div class="w-64">
                    <textarea id="descricao" class="resize-none h-36" name="descricao" maxlength="100"></textarea><br>
                    <p id="contador" class="text-right"></p>
                </div>
                <div class="flex justify-end mt-4">
                    <button class="bg-green-500 px-4 py-2 rounded-2xl text-white" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/tasks.js') }}"></script>
@endsection