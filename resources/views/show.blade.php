<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Visualizar
    </title>
</head>
<body>
    <h1> Detalhes do usuário </h1>
    <p> ID: {{ $user->id }} </p>
    <p> Nome: {{ $user->name }} </p>
    <p> E-mail: {{ $user->email }} </p>
    <p> senha: {{ $user->password }} </p>
    <p> Cadastro realizado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s')}}</p>
     <p> Cadastro Atualizado: {{ \Carbon\Carbon::parse($user->update_at)->format('d/m/Y H:i:s')}}</p>

    <a href="{{ route('home.index') }}">Voltar</a>
</body>
</html>