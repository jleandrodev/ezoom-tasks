<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {
            $tasks = Task::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {

            $tasks = Task::all();
        }

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

    public function destroy($id) {

        Task::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Tarefa deletada com sucesso!');

    }

    public function edit($id) {
        $task = Task::findOrFail($id);

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request) {
        $data = $request->all();

        Task::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Tarefa editada com sucesso!');
    }

    public function dashboard() {
        $tasks = Task::all();
        return redirect('/');
    }
}
