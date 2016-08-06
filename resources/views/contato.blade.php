@extends('layouts.app')

@section('title', "Contate-nos")

@section('content')
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
 <div class="col-md-9">
                <form>
                    <h2 class="form-heading">Contate-nos</h2>
                    <div class="form-group">
                        <label for="email">Endereço de e-mail:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comentários:</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

 </div>
@stop