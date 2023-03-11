<x-layout>
    @slot('btn')
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    @endslot
    {{-- Tela para editar uma task -> {{$idTask}} --}}
    {{-- {{$task->id}} --}}
    <section id="task-create">
        <h2>Edição de uma Tarefa</h2>

        <form action="{{ route('task.editing') }}" method="POST" class="form-create-task">
            @csrf


            <input type="hidden" name="id" value="{{$idTask}}"> {{-- faz o id ir para a requisição --}}
            
            <x-form.checkbox-edit done="{{$task->is_done}}"/>           
                

            <x-form.input-area name="title" label="Titulo da Task" placeholder="Digite o título da tarefa"
                required="required" value="{{ $task->title }}" />

            <x-form.input-area type="datetime-local" name="due_date" label="Data de Realização" required="required"
                value="{{ $task->due_date }}" />

            <x-form.select-category name="category_id" label="Categoria" required="required">
                @foreach ($allTasks as $category)
                    <option value="{{ $category->id }}" @if ($idTask == $category->id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select-category>

            <x-form.textarea label="Descrição" name="description" placeholder="Digite uma descrição para sua tarefa"
                value="{{ $task->description }}" />

            {{-- dois botões aqui em baixo --}}
            <x-form.form-button label1="Salvar Edição" label2="Resetar" />

        </form>
    </section>


</x-layout>
