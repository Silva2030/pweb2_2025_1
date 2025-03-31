@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h3>Formulário Aluno</h3>

    @php
        if(!empty($dado->id)){
            $action = route('aluno.update',$dado->id);
        } else {
            $action = route('aluno.store');
        }
    @endphp

    <form action="{{$action}}" method="post">
        @csrf

        @if(!empty($dado->id))
            @method('put')
        @endif

        <label for="">Nome</label><br>
        <input type="text" name="nome" value="{{old('nome', $dado->nome ?? '' )}}"><br>

        <label for="">CPF</label><br>
        <input type="text" name="cpf" value="{{old('cpf', $dado->cpf ?? '' )}}"><br>

        <label for="">Telefone</label><br>
        <input type="text" name="telefone" value="{{old('telefone', $dado->telefone ?? '' )}}"><br>

        <button type="submit">Salvar</button><br>
        <a href="{{ url('aluno') }}">Voltar</a>

    </form>

@stop
