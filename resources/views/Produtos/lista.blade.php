@extends('layouts.app')




@section('title', 'Lista de produtos')
@section('content')
<h2 class='text-center'>Produtos</h2>
@if (!Auth::guest())
	@if ((Auth::user()->admin))
	<a href="{{ url('/produtos/create') }}" class=" lead btn btn-default ">Adicionar um novo produto</a>
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
                    <a href="/produtos" class="list-group-item">Produtos</a>

                </div>
            </div>

<div class="col-md-9 ">

<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Produto</th>
            <th>id</th>
            <th>Preço</th>
            <th>Quantidade</th>
            @if (!Auth::guest())
            @if ((Auth::user()->admin))
                <th>Opções</th>
            @endif
            @endif
        </tr>
    </thead>
    <tbody>

    @foreach ($produtos as $produto)
    <tr>
    <td> {{$produto->nome}}</td>
     <td>{{$produto->id}}</td>
    <td>{{$produto->preco}}</td>
    <td>{{$produto->quantidade}}</td>
    @if (!Auth::guest())
            @if ((Auth::user()->admin))
        <td>
            <a href="{{ route('produtos.show', $produto->id) }}"
            class="btn btn-info">Visualizar produto</a>
            <a href="{{ route('produtos.edit', $produto->id) }}"
            class="btn btn-primary">Editar produto</a>
        </td>
      @endif
            @endif
  </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
@stop




