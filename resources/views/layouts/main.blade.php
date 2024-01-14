<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <!-- Styles -->
        <link href="/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <header>

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbar">
                        <a href="/" class="navbar-brand">
                            <img src="/images/ezoom_tasks_logo.png" alt="Logo ezoom Tasks"> Tasks
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">
                                    Tarefas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/tasks/create" class="nav-link">
                                    Criar Tarefa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    Minhas Tarefas
                                </a>
                            </li> 
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a 
                                        href="/logout" 
                                        class="nav-link" 
                                        onclick="event.preventDefault();
                                            this.closest('form').submit()">
                                        Logout
                                    </a>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    Entrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">
                                    Cadastrar
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg">{{ session('msg') }}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <footer>
            <p>ezoom. Tasks &copy 2024</p>
        </footer>
    </body>
</html>
