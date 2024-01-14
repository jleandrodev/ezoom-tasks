<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();

        $search = '';

        return view('welcome', ['tasks' => $tasks, 'search' => $search]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;

        $task->save();

        return redirect('/')->with('msg', 'Tarefa criada com sucesso!');
    }

    public function show($id) {
        $task = Task::findOrFail($id);

        return view('tasks.show', ['task' => $task]);
    }
}
