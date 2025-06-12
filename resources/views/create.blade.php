<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
</head>
<body>
    <a href ="{{ route('home.index') }}">Voltar</a>

    <h2> Cadadastrar usuario </h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error) 
           <p style="color: red"> {{ $error }} </p>
         @endforeach
    @endif

    <form action="{{ route('user.create.post') }}" method="POST">
        @csrf
        
        <label> Nome: </label>
        <input type="text" name="name" placeholder="Digite seu nome" value="{{ old('name') }}">

        <label> E-mail: </label>
        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{ old('email') }}">

        <label> Senha: </label>
        <input type="password" name="password" placeholder="Digite sua senha" value="{{ old('password') }}">

        <button type="submit"> Criar </button>
    </form>
</body> 
</html>