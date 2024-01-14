@extends('layouts.main')

@section('title', 'Ezoom Tasks')

@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque uma tarefa</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar uma tarefa..." />
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Lista de Tarefas</h2>
    <p class="subtitle">Veja todas as tarefas cadastradas...</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($tasks as $task)
        <div class="card col-md-3">
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="{{ $task->status === 'Pendente' ? 'card-status-pendente' : ($task->status === 'Concluída' ? 'card-status-concluida' : 'card-status-cancelada') }}">{{ $task->status }}</p>
                <p class="card-participantes"><ion-icon name="person-outline"></ion-icon> Responsável</p>
                <a href="/tasks/{{ $task->id }}" class="btn btn-primary">Ver Tarefa</a>
            </div>
        </div>
        @endforeach
        @if(count($tasks) == 0 && $search)
        <p>Não foram encontradas tarefas sobre {{ $search }}...</p>
        <p>
            <a href="/" class="btn btn-primary">Ver todas as tarefas</a>
        </p>

        @elseif(count($tasks) == 0)
        <p>Não existem tarefas para serem listadas...</p>
        @endif
    </div>
</div>
@endsection