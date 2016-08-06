@extends('layouts.app')


@section('title', 'Crie uma marca')
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




<h1>Adicionar uma nova marca</h1>
<p class="lead">Adicione uma nova marca abaixo.</p>
<hr>



{!! Form::open([
    'route' => 'marcas.store'
]) !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>



{!! Form::submit('Crie uma nova marca', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop