@extends('layouts.app')

@section('header')

@stop

@section('title', 'Lista de produtos')

@section('content')
<div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
<div class="panel-body">
{!! Form::open(['method'=>'GET','url'=>'produtos','class'=>'navbar-form navbar-left','role'=>'search'])  !!}


<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search"
    placeholder="Pesquise um produto...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"-->Pesquisar</i>
        </button>
    </span>
</div>
{!! Form::close() !!}
</div>
</div>

@if (!Auth::guest())
  @if ((Auth::user()->admin))
  <a href="{{ url('/produtos/create') }}" class=" lead btn btn-default ">Adicionar um novo produto</a>
<hr>
@endif
@endif

<div>
@if(isset($error))
    <h1>{{$error}} </h1>
  @endif

  @if(Session::has('error'))
  <div class="alert alert-danger">
   <p>{{Session::get('error')}} </p>
    </div>
  @endif

    @if(Session::has('message'))
     <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif

</div>

<div class="container">

<div class="row ">


    <div class="col-md-4">
                <img class="slide-image" src="imagens/Digital_Nutri_logo.jpg" alt="">
                <div class="list-group">
                    <a href="/sobre" class="list-group-item">Sobre</a>
                    <a href="/contato" class="list-group-item">Contate-nos</a>
                    <a href="/produtos" class="list-group-item">Produtos</a>
                    <a href="/dicas" class="list-group-item">Dicas</a>

                </div>
            </div>


<div class="col-md-8 ">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="imagens/gde_016-01-frutas-seca.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="imagens/logograndept.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="imagens/Sem Título-7.png" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>


  <p></p>

 <!-- Fim carrossel -->

      <ul class="thumbnails">
        @foreach($produtos as $produto)

<div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
            <img src="{{$produto->foto}}" class="" alt="ALT NAME" width="320" height="150">
            <div class="caption">
              <h3><a href="produtos/{{$produto->id}}">{{$produto->nome}}</a></h3>
              <p>Marca : <b>{{$produto->marca->nome}}</b></p>
              <p>Preço : <b>{{$produto->preco}}</b></p>
              <form action="/carrinho/add" name="add_to_cart" method="post" accept-charset="UTF-8">
              {!! csrf_field() !!}

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
            </div>
          </div>
     </div>
        @endforeach

      </ul>
    </div>
    </div>
  </div>


@stop