@extends('layouts.app')


@section('title', 'Crie uma dica')
@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif




<h1>Adicionar uma nova dica</h1>
<p class="lead">Adicione uma nova dica abaixo.</p>
<hr>



{!! Form::open([
    'route' => 'dicas.store'
]) !!}

<div class="form-group">
    {!! Form::label('titulo', 'Titulo:', ['class' => 'control-label']) !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('descricao', 'Descrição:', ['class' => 'control-label']) !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Crie uma nova dica', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop