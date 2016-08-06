@extends('layouts.app')


@section('title', 'Visualizando marca')
@section('content')


<h1>{{ $marca->nome}}</h1>
<hr>

<a href="{{ route('marcas.index') }}" class="btn btn-info">Volta para as  marcas</a>
<a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-primary">Editar marca</a>

<div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['marcas.destroy', $marca->id]
        ]) !!}
            {!! Form::submit('Apagar essa marca?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop