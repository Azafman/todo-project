<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'/*,'sla','otherMiddleware'*/])->group(function() {
    Route::get('/', [HomeController::class, 'index'] )->name('home');//name is the name of route
    Route::get('/task', [TaskController::class, 'index'])->name('task.view');
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/create-action', [TaskController::class, 'creating'])->name('task.createAction');//os dados enviados de 'task.create' virão para cá
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('tasks/edit', [TaskController::class, 'editing'])->name('task.editing');
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
});
/* BOM O MIDDLEWARE PROTEGE MINHAS ROTAS. NO PRIMEIRO PARAMETRO, DENTRO DO ARRAY, EU INFORMO OS MIDDLEWARES QUE SERÃO USADOS, PARA TODAS AS ROTAS DENTRO DA FUNÇÃO. NO CASO, AUTH(AUTENTICAÇÃO). TODA VEZ QUE EU TENTAR ACESSAR QUALQUER ROTA ESTABELECIDA DENTRO DA FUNÇÃO, E NÃO TIVER UM USUÁRIO AUTENTICADO(LOGADO), A ROTA SERÁ REDIRECIONADA PARA O ESTABELECIDO NO MIDDLEWARE. TORNANDO ASSIM, MINHAS ROTAS PROTEGIDAS. */



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('loginAction');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction'])->name('registerAction');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/* Route::get('/login', function () {
    return view('login');//caminho apartir da pasta view
}); */
