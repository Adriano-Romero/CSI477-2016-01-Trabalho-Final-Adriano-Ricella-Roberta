@extends('layouts.app')


@section('title', 'Edite o Produto')
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




<h1>Edite o produto</h1>
<p class="lead">Atualize as informações.</p>
<hr>




{!! Form::model($produto, [
    'method' => 'PATCH',
    'route' => ['produtos.update', $produto->id]
]) !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('preco', 'Preço:', ['class' => 'control-label']) !!}
    {!! Form::text('preco', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
    {!! Form::label('foto', 'Foto') !!}
    {!! Form::text('foto', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('foto') }}</small>
</div>

<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:', ['class' => 'control-label']) !!}
    {!! Form::text('quantidade', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group{{ $errors->has('marca_id') ? ' has-error' : '' }}">
    {!! Form::label('marca_id', 'Selecione a Marca') !!}
    {!! Form::select('marca_id', $marcas, null, ['id' => 'marca', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('marca_id') }}</small>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição:', ['class' => 'control-label']) !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Edite o produto', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop