@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-12 dashboard-title-container">
    <h3>Minhas Tarefas</h3>
</div>
<div class="col-md-12 dashboard-tasks-container">
    @if(count($tasks) > 0)
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Responsável</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td scope="row" class="align-middle text-center">{{ $loop->index + 1 }}</td>
                    <td scope="row" class="align-middle"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></td>
                    <td scope="row" class="align-middle text-center">{{ $task->user->name }}</td>
                    <td scope="row" class="align-middle text-center">
                        <span class="{{ $task->status === 'Pendente' ? 'card-status-pendente' : ($task->status === 'Concluída' ? 'card-status-concluida' : 'card-status-cancelada') }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td scope="row" class="align-middle text-center row">
                        <a href="/tasks/edit/{{ $task->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/tasks/{{ $task->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center">Você ainda não possui tarefas, <a href="/">clique aqui</a> para ver todas as tarefas.</p>
    @endif
</div>

@endsection