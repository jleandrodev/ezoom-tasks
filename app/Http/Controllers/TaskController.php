<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Exibe a lista de tarefas com opção de pesquisa.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        // Recupera o termo de pesquisa da requisição.
        $search = request('search');

        if($search) {
            // Filtra as tarefas com base no título durante a pesquisa.
            $tasks = Task::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            // Recupera todas as tarefas se não houver pesquisa.
            $tasks = Task::all();
        }

        // Retorna a view 'welcome' com as tarefas e o termo de pesquisa.
        return view('welcome', compact('tasks', 'search'));
    }

    /**
     * Exibe o formulário para criar uma nova tarefa.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        // Recupera todos os usuários para preencher a lista suspensa.
        $users = User::all();

        // Retorna a view 'tasks.create' com os usuários.
        return view('tasks.create', compact('users'));
    }

    /**
     * Armazena uma nova tarefa no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        // Cria uma nova instância de Task.
        $task = new Task;

        // Preenche os atributos da tarefa com os dados da requisição.
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user_id = $request->user_id;

        // Salva a tarefa no banco de dados.
        $task->save();

        // Redireciona de volta para a página inicial com uma mensagem.
        return redirect('/')->with('msg', 'Tarefa criada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma tarefa específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id) {
        // Encontra a tarefa pelo ID.
        $task = Task::findOrFail($id);

        // Retorna a view 'tasks.show' com os detalhes da tarefa.
        return view('tasks.show', compact('task'));
    }

    /**
     * Exclui uma tarefa específica do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        // Encontra a tarefa pelo ID e a exclui.
        Task::findOrFail($id)->delete();

        // Redireciona de volta para a página inicial com uma mensagem.
        return redirect('/')->with('msg', 'Tarefa deletada com sucesso!');
    }

    /**
     * Exibe o formulário para editar uma tarefa existente.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        // Encontra a tarefa pelo ID e recupera todos os usuários.
        $task = Task::findOrFail($id);
        $users = User::all();

        // Retorna a view 'tasks.edit' com a tarefa e os usuários.
        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Atualiza os detalhes de uma tarefa existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        // Obtém todos os dados da requisição.
        $data = $request->all();

        // Encontra a tarefa pelo ID e atualiza os dados.
        Task::findOrFail($request->id)->update($data);

        // Redireciona de volta para a página inicial com uma mensagem.
        return redirect('/')->with('msg', 'Tarefa editada com sucesso!');
    }

    /**
     * Exibe o painel de controle (dashboard) do usuário autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard() {
        // Obtém o usuário autenticado e suas tarefas associadas.
        $user = auth()->user();
        $tasks = $user->tasks;

        // Retorna a view 'tasks.dashboard' com as tarefas do usuário.
        return view('tasks.dashboard', compact('tasks'));
    }
}
