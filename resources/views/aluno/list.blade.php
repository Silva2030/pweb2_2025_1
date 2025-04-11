@extends('base')
@section('titulo', 'Listagem Aluno')
@section('conteudo')

    <h3>Listagem de Alunos</h3>
    <a href="{{ url('aluno/create') }}">Novo</a>

    <form action="{{ route('aluno.search') }}" method='post'>
        @csrf
        <label for="Tipo">
            Tipo
        </label>
        <select name="tipo">
            <option value="nome">Nome</option>
            <option value="cpf">CPF</option>
            <option value="telefone">Telefone</option>
        </select><br>
        <input type="text" name="valor" placeholder="valor" />
        <button type="submit">Buscar</button>
        <a href="{{ url('aluno/create') }}">Novo</a>
    </form>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Ação</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{$item->categoria->nome ?? ''}}</td>
                    <td>
                        <a href="{{ route('aluno.edit', $item->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('aluno.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Deseja remover o registro?')">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
