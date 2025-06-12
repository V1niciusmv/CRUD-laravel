<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <div>
        <h2> Edite seus dados </h2>
        @if (session('success'))
        <p style="color: green"> {{ session('success') }} </p>
    @endif
      @if (session('info'))
        <p style="color: red"> {{ session('info') }} </p>
    @endif

         @if ($errors->any())
        @foreach ($errors->all() as $error) 
           <p style="color: red"> {{ $error }} </p>
         @endforeach
    @endif

    <form action="{{ route('user.update.put', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label> Nome: </label>
        <input type="text" name="name" placeholder="Digite seu nome" value="{{ old('name', $user->name) }}">

        <label> E-mail: </label>
        <input type="email" name="email" placeholder="Digite seu E-mail" value="{{ old('email', $user->email) }}">

        <label> Senha: </label>
        <input type="password" name="password" placeholder="altere sua senha (Opcional)" value="{{ old('password') }}">

        <button type="submit"> Editar</button>
    </form>

<br>
        <a href="{{ route('home.index') }}">voltar</a>
</div>
</body>
</html>