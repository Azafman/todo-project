<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request) {
        //dd(Auth::user());//retorna o usuário logado (atual).

        if(Auth::check()) {
            return redirect()->route('home');
            /* DIFERENÇA: AUTH:USER FAZ UMA BUSCA PELO BD (E RETORNA ESSE DADOS), CHECK NÃO. OU SEJA, TRÁS UM CERTO GANHO, SE MEU OBJETIVO É SOMENTE VERIFICAR SE O USUÁRIO ESTÁ LOGADO. OU ALGO SEMELHANTE A ISSO. */
        }
        return view('login');
    }
    public function loginAction (Request $request) {
        //dd($dataValidaty); => passa somente os dados da request
        $dataValidaty = $request->validate([
            'email' => 'email',
            'password' => 'min:6'
        ]);//lembrando que $dataValidaty terá um array com a senha e email.

        //dd(Auth::attempt($dataValidaty));//se eu colocar o e-mail, e a senha corretos, então o retorno será true. Caso contrário, false. E de alguma grande e incrível forma, o laravel já faz a comparação com o o hash da senha, por mais que eu não tenha passado isso aqui.

        if(Auth::attempt($dataValidaty)) {
            return redirect()->route('home');
        }
         
        return view('login');
    }
    public function register(Request $request) {
        if(Auth::check()) {
            return redirect()->route('home');
        }
        return view('register');
    }
    public function registerAction(Request $request) {
        //dd($request->request); => o dd funciona como se fosse um return, tudo abaixo dele para de funcionar
        $request->validate([
            'name' => 'required|min:6', //=> o campo "name" é requerido
            'email' => 'required|email|unique:users,email', //  requerido, do tipo email, e unico na tabela users, na coluna email
            'password' => 'required|min:6|confirmed'             //requerido com no minimo 6 caracteres => o laravel conta que haverá um campo text com o name "password_confirmation". Caso eu queira fazer um confirmed com o name, deve haver um campo chamado name_confirmed, e aqui ficaria assim: 'name' => 'required|min:6|confirmed'
        ]);//aliás eu poderia fazer isso a mão, como no php por exemplo. Porém o laravel oferece essa função que se chama validate, facilitando muito.
        
        //caso haja erro em cima, a função não prossegue.
        //SE EU quiser que as mensagens de erros sejam em português, eu devo criar uma pasta pt-br em vendor/.../lang/
        $dataUser = $request->only(['name', 'email','password']);
        $dataUser['password'] = Hash::make($dataUser['password']);//gera uma hash da senha. hash essa que é única, isto é, não pode existir uma idêntica. Mas, pode ser comparada, que é o que irei fazer para logar. 
        User::create($dataUser);
        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();//faz o logout
        return redirect()->route('login');
    }
}
