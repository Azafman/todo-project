<x-layout nomePagina="Todo - Login">
    {{-- $nomePagina => em layout.blade.php --}}
    <x-slot:btn>
        {{-- {{route('home')}} => eu puxo a rota com o nome home já definida em web.php --}}
        <a href="{{ route('register') }}" class="btn btn-primary">
            Não tem conta ? Registre-se
        </a>
        {{-- a variavell $btn recebe <a href="#" class="btn btn-primary" >Registre-se</a> em x-layout --}}
    </x-slot:btn>
    <br>
    {{--     <a href="{{route('home')}}">Back to Home</a>0 --}}
    <section id="task-create">
        <h2>Entre em sua conta</h2>
        <form action="{{ route('loginAction') }}" method="POST" class="form-create-task">
            @csrf
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                EQUIVALENTE A:
                @csrf --}}

            @if ($errors->any()){{-- se tiver algum erro --}}
                <ul class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <x-form.input-area name="email" label="Seu e-mail" placeholder="Digite seu e-mail" required="required" />
            <x-form.input-area type="password" name="password" label="Sua senha" placeholder="Digite sua senha"
                required="required" />

            <x-form.form-button label1="Login" label2="Limpar" />

        </form>
    </section>

</x-layout>
