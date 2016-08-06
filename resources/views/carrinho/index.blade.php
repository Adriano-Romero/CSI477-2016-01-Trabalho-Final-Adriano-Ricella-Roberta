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
           <div class="col-sm-3 col-md-3" id="Carts-Sub-Containers">
                <form action="/carrinho/update" method="post" class="form-inline">
                    {!! csrf_field() !!}
                    <input type="hidden" name="produto" value="{{$carrinho_item->produtos->id}}" />
                    <input type="hidden" name="carrinho_id" value="{{$carrinho_item->id}}" />
                    <div class="form-group">
                        <select name="quantidade" class="form-control" title="Quantidade">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button class="btn btn-sm btn-default"><i class="fa fa-refresh" aria-hidden="true">Atualizar</i></button>
                    </div>
                </form>
            </div>
             <div class="col-sm-1 col-md-1">
              {{$carrinho_item->quantidade}}

            </div>
          </td>
          <td>
            {{$carrinho_item->produtos->preco}}
          </td>
          <td>
           {{$carrinho_item->total}}
          </td>
          <td>
            <a href="{{URL::route('delete_book_from_cart',array($carrinho_item->id))}}">Remover</a>
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