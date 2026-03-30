<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        Task::create([
            // 'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'prioridade' =>$request->prioridade,
            'descricao' => $request->descricao,
            'data_limite' => $request->data_limite,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Tarefa excluída com sucesso!');
    }

    public function edit($id) {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);

        $task->update([
            'titulo' => $request->titulo,
            'data_limite' => $request->data_limite,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade,
        ]);

        return redirect()->route('tasks.index')
                         ->with('success', 'Tarefa editada com sucesso!');
    }

    public function confirmTask($id) {
        $task = Task::findOrFail($id);

        if($task->status != 'cancelada') {
            $task->update([
                'status' => 'concluida'
            ]);
        }
            

        return redirect()->route('tasks.index');
    }

    public function cancelTask($id) {
        $task = Task::findOrFail($id);

        if($task->status != 'concluida') {
            $task->update([
            'status' => 'cancelada'
        ]);
        }
        

        return redirect()->route('tasks.index');
    }
}
