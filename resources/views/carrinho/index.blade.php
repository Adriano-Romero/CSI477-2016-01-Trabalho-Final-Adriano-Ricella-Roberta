@extends('layouts.app')

@section('title', 'Seu carrinho')

@section('content')

<div>
@if(isset($error))
    <h1>{{$error}} </h1>
  @endif

  @if(Session::has('error'))
   <h1>{{Session::get('error')}} </h1>
  @endif

   @if(Session::has('message'))
     <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif

</div>


	<div class="container" style="width:60%">
	{{Auth::id()}}
  <h1>Seu carrinho</h1>
  <table class="table">
    <tbody>
      <tr>
        <td>
          <b>Produto</b>
        </td>
        <td>
          <b>Quantidade</b>
        </td>
        <td>
          <b>Preço</b>
        </td>
        <td>
          <b>Total</b>
        </td>
        <td>
          <b>Remover</b>
        </td>
      </tr>
      @foreach($carrinho_produtos as $carrinho_item)
        <tr>
          <td>{{$carrinho_item->produtos->nome}}</td>
          <td>
           {{$carrinho_item->quantidade}}
          </td>
          <td>
            {{$carrinho_item->produtos->preco}}
          </td>
          <td>
           {{$carrinho_item->total}}
          </td>
          <td>
            <a href="{{URL::route('delete_book_from_cart',array($carrinho_item->id))}}">Delete</a>
          </td>
        </tr>
      @endforeach
      <tr>
        <td>
        </td>
        <td>
        </td>
        <td>
          <b>Total</b>
        </td>
        <td>
          <b>{{$carrinho_total }}</b>
        </td>
        <td>
        </td>
      </tr>
    </tbody>
  </table>
  <h1>Informaçãoes de envio</h1>
  <form action="/compra" method="post" accept-charset="UTF-8">
   {!! csrf_field() !!}
    <label>Endereço para Entrega</label><br>
    <textarea class="span4" name="endereco" rows="5"></textarea>
    <button class="btn btn-block btn-primary btn-large">Comprar</button>
  </form>
</div>
@stop