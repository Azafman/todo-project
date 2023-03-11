<x-layout>
    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary"> {{-- task.create -> é o nome da rota, sendo assim não preciso colocar o caminho da rota aqui. --}}
            Criar Tarefa
        </a>
        <a href="{{ route('logout') }}" class="btn btn-primary"> {{-- task.create -> é o nome da rota, sendo assim não preciso colocar o caminho da rota aqui. --}}
            Sair
        </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do Dia -
                @php
                    echo explode(' ', $user->name)[0];
                @endphp
            </h2>
            <div class="graph-header-line"></div>
            <div class="graph-header-date">
                <a href="{{route('home', ['filterDate' => $data['datePrevButton']])}}">
                    {{-- 'filterDate' acima não é uma variavel para ser usada em home, e sim um parametro -> http://127.0.0.1:8000/?filterDate=2023-03-10.--}}
                    <img src="assets/img/icon-prev.png" alt="">
                </a>
                {{$data['data']}}
                <a href="{{route('home', ['filterDate' => $data['dateNextButton']])}}">
                    <img src="assets/img/icon-next.png" alt="">
                </a>
            </div>
        </div>
        <div class="graph-header-subtitle">Tarefas <b>3/6</b></div>
        <div class="graph-placeholder">

        </div>
        <div class="task-left-footer">
            <img src="assets/img/icon-info.png" alt="">
            Restam 3 tarefas
        </div>
    </section>
    <section class="list">
        <div class="list-header">
            <select name="" id="" class="list-header-select">
                <option value="1">Todas as Tarefas</option>
            </select>
        </div>
        <div class="task-list">
            @foreach ($tasks as $dados)
                <x-task :dados=$dados />
            @endforeach
        </div>
    </section>
    <script>
        async function getChangeState(element) {
            let stateOfElement = element.checked; //true or false
            const idOfElement = element.dataset.id; //pega o id

            //O route pega a url base + a url do name. Assim sendo, quando o sistema estiver em operação, eu não preciso mudar todas as implementações de rotas (127.0.0.1:8000/home para sitemeu.com/home) por exemplo. O route resolve tudo. 
            //blade + js abaixo
            let rawResult = await fetch('{{ route('task.update') }}', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({stateOfElement, idOfElement, _token: '{{ csrf_token() }}'
                })
                /* assista a aula entendendo o token csrf 64 */
                /* talvez o professor tenha explicado o csrf do formulário de "forma errada"  por meios didáticos. o csrf garante que a requisição feita a determinado lugar do meu sistema vem do meu próprio sistema, e não de terceiros. E fazendo isso eu envio na requisição um token, que comprova que a mesma vem de dentro do sistema. */
                /* LEIA A 1DOCUMENTAÇÃO EM https://laravel.com/docs/10.x/csrf PARA ENTENDER */
                /* EM TODO O CORPO DE REQUISIÇÃO TEM O CAMPO TOKEN, SEJA A REQUISIÇÃO FEITA POR FORMULÁRIO OU O QUE FOR. ALIÁS ISSO NEM IMPORTA, LEMBRE-SE DO QUE É UMA REQUISIÇÃO. E QUANDO O TOKEN DA ENVIADO NO CORPO DA REQUISIÇÃO NÃO BATE COM O TOKEN DO SISTEMA, É GERADO UM ERRO. MAIS EXPLICAÇÃO NO FIM DO CÓDIGO*/
            });

            const result = await rawResult.json();//espera a resposta da requisicao
            /* console.log(result); result is a object*/ 
            if(!result.sucess) {
                element.checked = !element.checked;
                //poderia criar uma função informando que o bd não está funcionando ou algo assim
            } else {
                alert("Tarefa atualizada com Sucesso. Parabéns, rumo a constância!");
            }
        }
    </script>
</x-layout>

{{-- 
    1º Ponto: O Laravel gera automaticamente um "token" CSRF para cada sessão de usuário ativa gerenciada pelo aplicativo. Esse token é usado para verificar se o usuário autenticado é a pessoa que realmente faz as solicitações ao aplicativo. Como esse token é armazenado na sessão do usuário e muda sempre que a sessão é regenerada, um aplicativo mal-intencionado não consegue acessá-lo.

    2º Ponto: Sempre que você definir um formulário HTML "POST", "PUT", "PATCH" ou "DELETE" em seu aplicativo, inclua um campo CSRF _token oculto no formulário (para que o middleware de proteção CSRF possa validar a solicitação). Por conveniência, você pode usar a diretiva @csrf Blade para gerar o campo de entrada do token oculto:
    
    <form method="POST" action="/profile">
        
        @csrf
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    3ª Ponto: O middleware App\Http\Middleware\VerifyCsrfToken, que está incluído no grupo de middleware da Web por padrão, verificará automaticamente se o token na entrada da solicitação corresponde ao token armazenado na sessão. Quando esses dois tokens correspondem, sabemos que o usuário autenticado é quem inicia a solicitação.    
--}}
