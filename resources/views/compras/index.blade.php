@extends('layouts.app')
@section('title', 'Lista de Compras')
@section('content')



<div class="container" style="width:60%">

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

<h3>Suas compras</h3>
<div class="menu">
  <div class="accordion">
@foreach($compras as $compra)
 <div class="accordion-group">
      <div class="accordion-heading country">
        @if(Auth::user()->admin)
        <a class="accordion-toggle" data-toggle="collapse" href="#compra{{$compra->id}}">Compra #{{$compra->id}} - {{$compra->User->nome}} - {{$compra->created_at}}</a>
        @else
        <a class="accordion-toggle" data-toggle="collapse" href="#compra{{$compra->id}}">Compra #{{$compra->id}} - {{$compra->created_at}}</a>
        @endif
      </div>
      <div id="compra{{$compra->id}}" class="accordion-body collapse">
        <div class="accordion-inner">
          <table class="table table-striped table-condensed">
            <thead>
              <tr>
              <th>
              Produto
              </th>
              <th>
              Quantidade
              </th>
              <th>
              Preço
              </th>
              <th>
              Total
              </th>
              </tr>
            </thead>
            <tbody>
            @foreach($compra->compraProdutos as $compraitem)
              <tr>
                <td>{{$compraitem->nome}}</td>
                <td>{{$compraitem->pivot->quantidade}}</td>
                <td>{{$compraitem->pivot->preco}}</td>
                <td>{{$compraitem->pivot->total}}</td>
              </tr>
            @endforeach
              <tr>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                <td><b>{{$compra->total}}</b></td>
              </tr>
              <tr>
                <td><b>Endereço de Entrega</b></td>
                <td>{{$compra->endereco}}</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endforeach
</div>
</div>
@stop