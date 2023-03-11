<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) {
        //dd(Auth::user());retorna o usuario logado(dados) => caso não tenha retornará null
        //$tasks = Task::all()->take(3);

        /* MUITO IMPORTANTE! EM config/app na linha 72, o time zone esteja como "America/Sao_Paulo" */
        /* Anatomia da request: http://127.0.0.1:8000/?filterDate=2023-03-11; agora é só usar... */
        if($request->filterDate) {
            $filterDate = $request->filterDate;
        } else {
            $filterDate = date('Y-m-d');//data de hoje (atual)
        }
        $carbonDate = Carbon::createFromDate($filterDate);//uma biblioteca para data
        /* EXPLICAÇÕES ABAIXO */

        $dados['data'] = $carbonDate->format('d \d\e M');//M-> 
        $dados['datePrevButton'] = $carbonDate->addDay(-1)->format('Y-m-d');//o objeto alterado é o proprío carbonDate. Por isso na linha de baixo eu add 2 dias.
        $dados['dateNextButton'] = $carbonDate->addDay(2)->format('Y-m-d');
        $tasks = Task::whereDate('due_date', $filterDate)->get();//filtra por uma data especifica (campoDaData, dataParaFiltrar)
        /* Task:whereDate(campoParaFiltrar, dataDesejada)->get(); */
        $authUser = Auth::user();

        return view('home', ['tasks' => $tasks,'user' => $authUser, 'data' => $dados]);
    }
}
/* 
$carbonDate = Carbon::createFromDate('2022-21-09');//aqui eu coloco uma data do tipo que tem no bd
$dados['data'] = $carbonDate->format('d \d\e M');//data recebe o dia e o nome do Mês
$dados['datePrevButton'] = $carbonDate->addDay(-1)->format('Y-m-d');//dataPrev recebe a data que já infomei, com um dia adicionado, porém no formato do bd
$dados['dateNextButton'] = $carbonDate->addDay(2)->format('Y-m-d');//dataPrev recebe a data que já infomei, com um dois adicionados(duvida ? assista a aula), porém no formato do bd
*/