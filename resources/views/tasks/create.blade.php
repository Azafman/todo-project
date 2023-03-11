<x-layout nomePagina="Criar Tarefa">
    @slot('btn')
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    @endslot
    <section id="task-create">
        <h2>Criar Tarefa</h2>

        <form action="{{route('task.createAction')}}" method="POST" class="form-create-task">
            @csrf {{-- garante que a rota que será acessada pelo action, vem do formulário. Ou seja, impossibilita o uso de requisições via terceiros, como por exemplo o insomnia --}}
            {{-- <div class="input-area">
                <label for="due_date">
                    Data de Realização
                </label>
                <input name="due_date" id="due_date" type="date" required>
            </div> --}}
            {{-- <div class="input-area">
                <label for="category">
                    Categoria
                    <select name="category" id="category" required>
                </label>
                    <option selected disabled value="">Selecione a Categoria</option>
                    <option >Valor qualquer</option>
                </select>
            </div> --}}

            {{-- x-nomepasta.nomearquivo --}}
            <x-form.input-area name="title" label="Titulo da Task" placeholder="Digite o título da tarefa"
                required="required" />

            <x-form.input-area type="datetime-local" name="due_date" label="Data de Realização" required="required" />

        <x-form.select-category name="category_id" label="Categoria" required="required">
            {{-- deixar o name como o nome da coluna do BD, É UMA BOA PRÁTICA, O QUE FACILITA MUITO TRABALHO. PORQUE NO CONTROLLER O NOME DO ATRIBUTO VEM DO NAME, E É MUITO MAIS FACIL EMPURRAR ISSO PRO DB, SE A O NAME FOR IGUAL A COLUNA --}}
            @foreach ($data['categories'] as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-form.select-category>

        <x-form.textarea label="Descrição" name="description" placeholder="Digite uma descrição para sua tarefa" />
        {{-- dois botões aqui em baixo --}}
        <x-form.form-button label1="Criar Tarefa" label2="Resetar" />

    </form>
</section>

</x-layout>
