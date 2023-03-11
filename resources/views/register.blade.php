<x-layout nomePagina="Todo - Login">
    {{-- $nomePagina => em layout.blade.php --}}
    <x-slot:btn>
        {{-- {{route('home')}} => eu puxo a rota com o nome home já definida em web.php --}}
        <a href="{{ route('login') }}" class="btn btn-primary">
            Já tem conta ? Faça Login
        </a>
        {{-- a variavell $btn recebe <a href="#" class="btn btn-primary" >Registre-se</a> em x-layout --}}
    </x-slot:btn>
    <br>
    {{--     <a href="{{route('home')}}">Back to Home</a>0 --}}
    <section id="task-create">
        <h2>Criar Usuário</h2>
        <form action="{{ route('registerAction') }}" method="POST" class="form-create-task">
            @csrf
            @if ($errors->any()){{-- se tiver algum erro --}}
                <ul class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <x-form.input-area name="name" label="Seu nome" placeholder="Digite seu nome" required="required" />
            <x-form.input-area name="email" label="Seu e-mail" placeholder="Digite seu e-mail" required="required" />
            <x-form.input-area type="password" name="password" label="Sua senha" placeholder="Digite sua senha" required="required" />
            <x-form.input-area type="password" name="password_confirmation" label="Sua senha" placeholder="Digite sua senha" required="required" {{--the name is very important, for use the function of laravel, $request->validate();--}}/>

            <x-form.form-button label1="Registrar-se" label2="Limpar" />

        </form>
    </section>

</x-layout>
