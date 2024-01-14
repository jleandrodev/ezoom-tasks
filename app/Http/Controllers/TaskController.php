<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\User;

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

        return view('welcome', compact('tasks', 'search'));
    }

    public function create() {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    public function store(Request $request) {
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user_id = $request->user_id;

        $task->save();

        return redirect('/')->with('msg', 'Tarefa criada com sucesso!');
    }

    public function show($id) {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    public function destroy($id) {

        Task::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Tarefa deletada com sucesso!');

    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request) {
        $data = $request->all();

        Task::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Tarefa editada com sucesso!');
    }

    public function dashboard() {
        $user = auth()->user();
        $tasks = $user->tasks;

        return view('tasks.dashboard', compact('tasks'));

    }
}
