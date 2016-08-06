@extends('layouts.app')


@section('title', 'Visualizando produto')
@section('content')


<h1>{{ $produto->nome}}</h1>
  <img src="{{ url($produto->foto) }}" class="" alt="ALT NAME" height="300" >
<hr>

<p class="lead">{{ $produto->descricao }}</p>

<p>Marca : <b>{{$produto->marca->nome}}</b></p>
<p>Preço : <b>{{$produto->preco}}</b></p>
<p>Descrição : <b>{{$produto->descricao}}</b></p>
<form action="/carrinho/add" name="add_to_cart" method="post" accept-charset="UTF-8">
              {!! csrf_field() !!}
			  <div class="col-sm-3 col-lg-3 col-md-3">
                <input type="hidden" name="produto" value="{{$produto->id}}" />
                Quantidade:
                <select name="quantidade" style="width: 100%;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              <p align="center"><button class="btn btn-info btn-block">Adicionar ao Carrinho</button></p>
            </form>

</div> <br> <br>
<div>
	<a href="/produtos" class="btn btn-danger">Volta para as  produtos</a>
</div>





@stop