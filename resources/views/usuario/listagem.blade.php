@extends('layout.template')
@section('titulo', ' de Listagem')

@section('conteudo')
      <table class="highlight">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>#</th>
            <th>#</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($sql as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td style="width: 10px;"><a class="waves-effect waves-light btn" href="{{ route('listarAlterar', ['chave' => $user->id]) }}">Alterar</a></td>
            <td style="width: 10px;"><a class="waves-effect waves-light btn" href="{{ route('deletar', ['chave' => $user->id]) }}">Deletar</a></td>
          </tr>  
          @endforeach
        </tbody>
      </table>
      {{ $sql->links('layout.paginacao') }}
      
      <div class="input-field col s6">
          <!-- botao que leva para o formuario de cadastro -->
          <a class="waves-effect waves-light btn" href="{{ route('cadastrar') }}">Incluir</a>
      </div>    
@endsection






