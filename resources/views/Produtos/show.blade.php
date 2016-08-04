@extends('layouts.app')


@section('title', 'Visualizando produto')
@section('content')


<h1>{{ $produto->nome}}</h1>
<p class="lead">{{ $produto->descricao }}</p>
<hr>

<p>Marca : <b>{{$produto->marca->nome}}</b></p>
<p>Preço : <b>{{$produto->preco}}</b></p>

<a href="/produtos" class="btn btn-info">Volta para as  produtos</a>



@stop