@extends('layout.template')

@section('titulo', ' de Usuários')

@section('conteudo')
    <form action="{{ route('salvar') }}" method="post">

        {{ csrf_field() }}    
        
        <input type="hidden" name="id" value="{{ isset($camposAlteracao->id) ? $camposAlteracao->id : ''  }}"/>

        <div class="input-field col s6">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ isset($camposAlteracao->name) ? $camposAlteracao->name : ''}}"/>

            @if($errors->has('nome'))
                @foreach($errors->get('email') as $erro)
                    <strong class="erro">{{ $erro }}</strong>
                @endforeach
            @endif

        </div>

        <div class="input-field col s6">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ isset($camposAlteracao->email) ? $camposAlteracao->email : '' }}"/>
        </div>

        <div class="input-field col s6">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" value="{{ isset($camposAlteracao->password) ? $camposAlteracao->password : '' }}"/>
        </div>


        <!-- value="{{ isset($camposAlteracao->name) ? $camposAlteracao->name : '' }}" -->

        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar</button>
        <a class="waves-effect waves-light btn" href="{{ route('listagem') }}">Cancelar</a>
    </form>
@endsection