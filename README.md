# Gerenciador de Tarefas 

## Visão Geral 

O Gerenciador de Tarefas é uma aplicação web construída com Laravel, um framework web em PHP. Permite aos usuários gerenciar tarefas, oferecendo recursos para criar, editar e excluir tarefas. Além disso, inclui um painel para os usuários visualizarem suas próprias tarefas.

### Tecnologias Utilizadas 

- Laravel
- PHP
- MySQL (como banco de dados padrão)
- Bootstrap (para estilos)
- Livewire (para interações dinâmicas)

## Recursos 

1. **Gerenciamento de Tarefas:**

   - Visualizar uma lista de tarefas.
   - Criar uma nova tarefa.
   - Visualizar detalhes de uma tarefa específica.
   - Editar uma tarefa existente.
   - Excluir uma tarefa.
2. **Painel do Usuário:**

   - Os usuários têm um painel personalizado exibindo as tarefas que lhes são atribuídas.

## Como Executar o Projeto 

1. **Clonar o Repositório:**

   `git clone https://github.com/jleandrodev/ezoom-tasks.git`
2. **Instalar Dependências:**

   ``cd ezoom-tasks composer install``
3. **Configurar o Banco de Dados:**

   - Crie um novo banco de dados MySQL.
   - Copie o arquivo `.env.example` para `.env` e configure a conexão com o banco de dados.
4. **Gerar Chave de Aplicação:**

   `php artisan key:generate`
5. **Executar as Migrações:**

   `php artisan migrate`
6. **Iniciar o Servidor da Aplicação:**

   `php artisan serve`
7. **Acessar a Aplicação:** Abra seu navegador e acesse http://localhost:8000

## Autenticação 

A aplicação utiliza o sistema de autenticação integrado do Laravel. Os usuários precisam se registrar e fazer login para acessar os recursos de gerenciamento de tarefas e o painel personalizado.

## Documentação da API 

### Endpoints 

1. **Listar todas as tarefas:**

   - **Endpoint:** `/tasks`
   - **Método:** GET
2. **Obter detalhes de uma tarefa específica:**

   - **Endpoint:** `/tasks/{id}`
   - **Método:** GET
3. **Criar uma nova tarefa:**

   - **Endpoint:** `/tasks`
   - **Método:** POST
   - **Parâmetros:** `title`, `description`, `status`, `user_id`
4. **Atualizar uma tarefa existente:**

   - **Endpoint:** `/tasks/update/{id}`
   - **Método:** PUT
   - **Parâmetros:** `title`, `description`, `status`
5. **Excluir uma tarefa:**

   - **Endpoint:** `/tasks/{id}`
   - **Método:** DELETE
6. **Painel do Usuário:**

   - **Endpoint:** `/dashboard`
   - **Método:** GET

### Uso

- Para listar todas as tarefas: `GET /tasks`
- Para obter detalhes de uma tarefa: `GET /tasks/{id}`
- Para criar uma nova tarefa: `POST /tasks` com parâmetros `title`, `description`, `status`, `user_id`
- Para atualizar uma tarefa existente: `PUT /tasks/update/{id}` com parâmetros `title`, `description`, `status`
- Para excluir uma tarefa: `DELETE /tasks/{id}`
- Para visualizar o painel do usuário: `GET /dashboard`

## Observações Adicionais

- Certifique-se de ter o Composer e o PHP instalados em sua máquina.
- Atualize o arquivo `.env` com suas credenciais do banco de dados.
- Garanta que as extensões PHP necessárias estejam instaladas (por exemplo, extensão MySQL).
