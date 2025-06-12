<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div>

    <h1> Lista de usuarios </h1>

    @if (session('success'))
        <p style="color: green"> {{ session('success') }} </p>
    @endif
 
    @forelse ($users as $user)
        ID: {{ $user->id }} <br>
        Nome: {{ $user->name }} <br>
        E-mail: {{ $user->email }} <br>
        <a href="{{ route('user.show', $user->id) }}">Visualizar</a>
        <a href="{{ route('user.edit', $user->id) }}">Editar</a>
        <form action="{{ route('user.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
</form>
        <br>
    @empty
        <p style="color: red"> Nenhum usuario cadastrado </p>
    @endforelse
    <br>
    <div>
        <a href ="{{ route('user.create') }}">Criar</a>
</div>
</div>
</body>
</html>