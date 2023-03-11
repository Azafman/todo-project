<div class="task">
    <div class="title">
        <input type="checkbox" name="" id="" onchange="getChangeState(this)" data-id="{{$dados['id']}}"
        @if ($dados && $dados['is_done'])
            checked
        @endif
        >
        <div class="task-title">{{$dados['title'] ?? ''}}</div>
    </div> 
    <div class="priority">
        <div class="sphere"></div>
        <div class="irineu">{{$dados->category->title ?? ''}}</div>
        {{-- relationship: nesse registro, pegue a categoria do mesmo e por fim o título --}}
    </div>
    <div class="actions">
        <a href="{{route('task.edit', ['id' => $dados['id']])}}"> 
            {{-- http://127.0.0.1:8000/task/edit?id=2 --}}
            <img src="assets/img/icon-edit.png" alt="">
        </a>
        <a href="{{route('task.delete', ['id' => $dados['id']])}}">
            <img src="assets/img/icon-delete.png" alt="">
        </a>
    </div>
</div>
{{-- {{csrf_token() === session()->token()}} --}}
{{-- 
    <a href="{{route('task.delete', ['id' => $dados['id']])}}">
    (/task/edit)/delete?id=1    
--}}