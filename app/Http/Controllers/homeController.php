<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {   // Retorna a view home
       $users = User::all();
       return view('home', ['users' => $users]);
    }

    public function create() {
        // Retorna a view de criação de usuário
        return view('create');
    }

     public function create_back(UserRequest $request) {
        // validar formulario
        $request->validated();

        //Cadastrar users   
        User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('home.index')->with('success', 'Usuario criado com sucesso!');
    }

    //PAGE VISUALIZAR
    public function show(User $user) {
        // Retorna a view de visualização de usuário
        return view('show', ['user' => $user]);
    } 

    //PAGE EDITAR
    public function edit(User $user) {
        return view('edit', ['user' => $user]);
    }

    // BACK EDITAR 
    public function update_back(UserRequest $request, User $user) {
        $request->validated();

        $dados = [];

        if ($user->name !== $request->name) {
            $dados['name'] = $request->name;
        } if ($user->email !== $request->email) {
            $dados['email'] = $request->email;
        }if ($request->filled('password')) {
            $dados['password'] = bcrypt($request->password);
        }
        if (!empty($dados)) {
            $user->update($dados);   
            return redirect()->back()->with('success', 'Usuario atualizado com sucesso!');
        } else {
            return redirect()->back()->with('info', 'Nenhum dado foi alterado.');
        }
    }

    // BACK DELETE
    public function delete_back(User $user) {
        $user->delete();
        return redirect()->route('home.index')->with('success', 'Usuario deletado com sucesso!');
    }
}