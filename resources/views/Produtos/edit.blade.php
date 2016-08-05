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




<h1>Adicione um novo produto</h1>
<p class="lead">Insira  as informações.</p>
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
    {!! Form::textarea('preco', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:', ['class' => 'control-label']) !!}
    {!! Form::textarea('quantidade', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group{{ $errors->has('marca_id') ? ' has-error' : '' }}">
    {!! Form::label('marca_id', 'Selecione a Marca') !!}
    {!! Form::select('marca_id', $marcas, null, ['id' => 'marca', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('marca_id') }}</small>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição:', ['class' => 'control-label']) !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Crie uma nova dica', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop