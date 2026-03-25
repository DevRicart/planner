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
}
