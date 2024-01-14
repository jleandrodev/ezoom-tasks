@extends('layouts.main')

@section('title', 'Editar Tarefa')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Edite a tarefa: {{ $task->title }}</h1>
    <form action="/tasks/update/{{ $task->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tarefa:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Tarefa..." value="{{ $task->title }}" />
        </div>
        <div class="form-group">
            <label for="description">Descrição da Tarefa:</label>
            <textarea name="description" id="description" class="form-control" >{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="user_id">Responsável:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option {{ $task->user == $user ? "selected='selected'" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="Pendente" {{ $task->status == "Pendente" ? "selected='selected'" : ""}}>Pendente</option>
                <option value="Concluída" {{ $task->status == "Concluída" ? "selected='selected'" : ""}}>Concluída</option>
                <option value="Cancelada" {{ $task->status == "Cancelada" ? "selected='selected'" : ""}}>Cancelada</option>
            </select>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Salvar Tarefa">
    </form>
</div>
@endsection