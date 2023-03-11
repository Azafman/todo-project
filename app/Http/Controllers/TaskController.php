<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class TaskController extends Controller
{
    //
    public function index() {
        //show one task
    }
    public function create() {
        $data = [];
        $data['categories'] = Category::all();

        return view('tasks.create', ['data' => $data]);
        /* LEMBRANOD QUE AQUI NÃO É O NOME DA ROTA, ALIÁS NEM USADA A FUNÇÃO PARA ISSO FOI. MAS SIM O CAMINHO A PARTIR DO DIRETÓRIO VIEWS, ATÉ O ARQUIVO DESEJADO. */
    }
    public function creating(Request $request) {
        /*return $request->all();=> a partir do objeto retornado deduzo que: somente colocar o name no select(não preciso por nome) quando eu o informo no only(abaixo) já consigo ter acesso ao option selecionado. O input date traz os dados no padrão do BD. A REQUISIÇÃO DO TIPO POST, ME LEMBRA O INSOMNIA, ALIÁS, PARA PEGAR OS DADOS DA REQUISIÇÃO FEITA OS PASSOS SÃO OS MESMOS, OS DADOS VEM PARA ESTE ESCOPO, MAIS ESPECIFICAMENTE $REQUEST.*/
        $dataTask = $request->only(['title', 'due_date', 'category_id', 'description']);//get the name of attribute blade
        $dataTask['user_id'] = 1;

        Task::create($dataTask);
        return redirect(route('home'));
    }
    public function edit(Request $request) {
        $id = $request->id;

        if(!Task::find($id)) {
            return redirect(route('home'));
        }
        
        $data['idTask'] = $id;//acesso com $idTask e não $data->idTask.
        $data['task'] = Task::find($id);
        $data['allTasks'] = Task::all();
        return view('tasks.edit', $data);
    }
    public function editing(Request $r) {
        /* LEMBRANDO QUE OS D\ADOS VEM EM FORMA DE REQUISIÇÃO, OU SEJA EU PEGO OS DADOS USANDO ONLY() */
        $dataForUpdate = $r->only(['title','due_date','description', 'category_id']);
        if($r->only(['is_done'])) {
            $dataForUpdate['is_done'] = 1;          
        } else {
            $dataForUpdate['is_done'] = 0;          
        }
        $task = Task::find($r->id);
        //dd($dataForUpdate);
        if(!$task) {
            return "ERROR => TASK DOES NOT EXISTS";
        }
        $task->update($dataForUpdate);
        return redirect(route('home')); 
    }
    public function delete(Request $r) {
        $task = Task::find($r->id);
 
        if($task) {
            $task->delete();
        } 
        return Redirect(route('home')); 
    }
    public function update(Request $request) {
        /* $task = Task::findOrFail($request->idOfElement);//se não achar irá façhar */
        $task = Task::find($request->idOfElement);//se não achar irá façhar
        if(!$task) {
            return ['sucess' => false];
        }
        $task->is_done = $request->stateOfElement;
        $task->save();
        
        return ['sucess' => true];

        //Task::where('id', '=', $dadosRequsicao['id'])->update($dadosRequsicao);
    }
}
