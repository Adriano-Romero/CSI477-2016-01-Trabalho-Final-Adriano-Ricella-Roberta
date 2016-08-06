@extends('layouts.app')


@section('title', 'Edite a  marca')
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




<h1>Edite a marca</h1>
<p class="lead">Atualze as informações.</p>
<hr>



{!! Form::model($marca, [
    'method' => 'PATCH',
    'route' => ['marcas.update', $marca->id]
]) !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>



{!! Form::submit('Edite a marca', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop