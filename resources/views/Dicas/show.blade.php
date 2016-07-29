@extends('layouts.app')


@section('title', 'Visualizando dica')
@section('content')


<h1>{{ $dica->titulo }}</h1>
<p class="lead">{{ $dica->descricao }}</p>
<hr>

<a href="{{ route('dicas.index') }}" class="btn btn-info">Volta para as  dicas</a>
<a href="{{ route('dicas.edit', $dica->id) }}" class="btn btn-primary">Editar dica</a>

<div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['dicas.destroy', $dica->id]
        ]) !!}
            {!! Form::submit('Apagar essa dica?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop