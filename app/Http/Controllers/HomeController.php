<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        //dd(Auth::user());retorna o usuario logado(dados) => caso não tenha retornará null
        $tasks = Task::all()->take(3);
        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks,'user' => $authUser]);
    }
}
