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
                <ion-icon name="flag-outline"></ion-icon>
                <span class="{{ $task->status === 'Pendente' ? 'card-status-pendente' : ($task->status === 'Concluída' ? 'card-status-concluida' : 'card-status-cancelada') }}">
                    {{ $task->status }}
                </span>
            </p>
            <p class="task-resp"><ion-icon name="people-outline"></ion-icon> Responsável</p>
            <h3>Descrição da Tarefa:</h3>
            <p class="task-description">{{ $task->description }}</p>
        </div>
    </div>
</div>
@endsection