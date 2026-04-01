<x-app-layout>
<div class="flex flex-col items-center mt-6">
    <div>
        <div>
            <h1 class="text-4xl">Minhas Tarefas</h1>
        </div>

        <div class="m-8 w-full">
            <a class="p-3 bg-blue-700 text-white inline-flex gap-2 rounded-md" href="{{ route('tasks.create') }}">Nova Tarefa
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg> </a>
        </div>

        @if($tasks->isEmpty())
            <h3 class="text-2xl">Não há tarefas registradas!</h3>
        @endif
        <div class="grid grid-cols-3 gap-10">
            @foreach($tasks as $task)
                <div style="-webkit-box-shadow: 5px 5px 14px -3px #000000;  box-shadow: 5px 5px 14px -3px #000000;"
                class="w-60 h-72 border border-black rounded mb-2 bg-white flex flex-col relative ">
                    <div class="flex justify-end gap-2 bg-blue-500 text-white px-5 py-3 border-black border-b">
                        <h4 class="text-xl">{{ $task->titulo }}</h4>
                        <a href="{{ route('tasks.edit', $task->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>

                    </div>
                    <div class="px-5 py-3">
                        <div class="mt-2 mb-2">
                            <div class="mb-1">

                            </div>
                            <div class="flex justify-between">
                                <div>{{ $task->data_limite }}</div>
                                <div>{{ $task->prioridade }}</div>
                            </div>
                        </div>
                        <div>
                            <p class="break-words">{{ $task->descricao}}</p>
                        </div>
                        <div class="flex justify-between items-center mt-3 absolute bottom-5 left-0 right-0 mx-5">
                            @php $status = $task->getStatusColor(); @endphp
                            <div class="flex justify-between w-full">
                                <div class="p-1 border border-black rounded-md {{ $status }}">{{ $task->status }}</div>
                                <div class="flex gap-2">
                                    <form action="{{ route('tasks.confirmTask', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-green-500 p-2 rounded-full inline-flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="2"
                                                    stroke="white"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('tasks.cancelTask', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bg-red-500 p-2 rounded-full inline-flex items-center justify-center" onclick="return confirm('Tem certeza que deseja cancelar essa tarefa?')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="2"
                                                stroke="white"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</x-app-layout>
