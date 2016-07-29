@extends('layouts.app')

@section('content')

<h1>Edite a dica - {{ $dica->titulo }} </h1>
<p class="lead">Edite a dica abaixo <a href="{{ route('dicas.index') }}">Voltar as  dicas.</a></p>

{{$dica->descricao}}
<hr>


@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif


{!! Form::model($dica, [
    'method' => 'PATCH',
    'route' => ['dicas.update', $dica->id]
]) !!}


<div class="form-group">
    {!! Form::label('titulo', 'titulo:', ['class' => 'control-label']) !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descricao', 'descricao:', ['class' => 'control-label']) !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update dica', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop