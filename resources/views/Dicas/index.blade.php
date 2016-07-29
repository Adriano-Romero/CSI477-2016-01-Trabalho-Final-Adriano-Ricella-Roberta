@extends('layouts.app')




@section('title', 'Lista de dicas')
@section('content')
<h2>Lista de Dicas</h2>
<li><a href="{{ url('/dicas/create') }}" class=" lead btn btn-default">Adicionar uma nova dica</a></li>
<hr>

@foreach($dicas as $dica)
    <h3>{{ $dica->titulo }}</h3>
    <p>{{ $dica->descricao}}</p>
    <p>
        <a href="{{ route('dicas.show', $dica->id) }}" class="btn btn-info">Visualizar dica</a>
        <a href="{{ route('dicas.edit', $dica->id) }}" class="btn btn-primary">Editar Dica</a>
    </p>
    <hr>
@endforeach

@stop



