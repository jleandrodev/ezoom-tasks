@extends('layouts.main')

@section('title', 'Detalhes da Tarefa')

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/images/placeholder_tasks.jpg" class="img-fluid" alt="{{ $task->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $task->title }}</h1>
            <p>
                <ion-icon class="info-icon" name="flag-outline"></ion-icon>
                <span class="{{ $task->status === 'Pendente' ? 'card-status-pendente' : ($task->status === 'Concluída' ? 'card-status-concluida' : 'card-status-cancelada') }}">
                    {{ $task->status }}
                </span>
            </p>
            <p class="task-resp"><ion-icon class="info-icon" name="people-outline"></ion-icon> {{ $task->user->name }}</p>
            <h3>Descrição da Tarefa:</h3>
            <p class="task-description">{{ $task->description }}</p>

            <div class="col-md-12">
                <h3>Ações:</h3>
                <div class="row">
                    <a href="/tasks/edit/{{ $task->id }}" class="btn btn-info">
                        <ion-icon name="create-outline"></ion-icon>
                        Editar
                    </a>
                    <form action="/tasks/{{ $task->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection