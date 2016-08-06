@extends('layouts.app')




@section('title', 'Lista de Marcas')
@section('content')
<h2 class='text-center'>Marcas</h2>
@if (!Auth::guest())
	@if ((Auth::user()->admin))
	<a href="{{ url('/marcas/create') }}" class=" lead btn btn-default ">Adicionar uma nova marca</a>
<hr>
@endif
@endif

<div class="container">


 <div class="col-md-3">
                <img class="slide-image" src="imagens/Digital_Nutri_logo.jpg" alt="">
                <div class="list-group">
                    <a href="/sobre" class="list-group-item">Sobre</a>
                    <a href="/contato" class="list-group-item">Contate-nos</a>
                    <a href="/produtos" class="list-group-item">Produtos</a>
                    <a href="/dicas" class="list-group-item">Dicas</a>

                </div>
            </div>

<div class="col-md-9 ">
@foreach($marcas as $marca)
    <h3>{{ $marca->nome}}</h3>
    <p>
        <a href="{{ route('marcas.show', $marca->id) }}" class="btn btn-info">Visualizar marca</a>
         @if (!Auth::guest())
			@if (Auth::user()->admin)
                <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-primary">Editar Dica</a>
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['marcas.destroy', $marca->id]
        ]) !!}
            {!! Form::submit('Apagar essa marca?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
            @endif
        @endif

    </p>
    <hr>
@endforeach
</div>
</div>
@stop




