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
}
