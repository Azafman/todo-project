<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');/* TENDO EM MENTE QUE PARA LOGAR EU ENVIEI DADDOSD PARA A FUNÇÃO LOGINACTION. E DENTRO DESTA FUNÇÃO FAÇO O USO DE OUTRA FUNÇÃO Auth::attempt(PASSANDO OS DADOS ENVIADOS PELO USUÁRIO), DENTRO DELA, EU COMPARO SE TEM UM E-MAIL E SENHA RESPECTIVAMENTE IGUAIS, E SE SIM ARMAZERNO EM ALGUM LUGAR DA CLASSE AUTH(auth::user() => ptova disso em HomeController()), OS DADOS DO USUARIO E ROTORNO TRUE. DE ALGUMA FORMA ELE CONFERE SE TEM UM USUARIO AUTENTICADO, SE NÃO RETORNA A ROTA 'LOGIN'.*/
        /* ALIÁS O PROFESSOR DISSE QUE ESSES NOMES (REGISTER, LOGIN, LOGOUT) SÃO PADRÕES DO LARAVEL, RECOMENDANDO SEGUIR OS MESMO PADRÕES. */
    }
}
