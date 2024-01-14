@extends('layouts.main')

@section('title', 'Criar Tarefa')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Criar uma Tarefa</h1>
    <form action="/tasks" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Tarefa:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da Tarefa..." />
        </div>
        <div class="form-group">
            <label for="description">Descrição da Tarefa:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que deve ser feito?"></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">Responsável:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="Pendente">Pendente</option>
                <option value="Concluída">Concluída</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Criar Tarefa">
    </form>
</div>
@endsection