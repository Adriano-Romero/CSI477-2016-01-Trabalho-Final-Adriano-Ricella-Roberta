@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bem-vindo, funções realizadas:</div>

                <div class="panel-body">
                    Migração: Feita com o comando artisan make:migrate <br>
                    Seed: artisan db:seed <br>
                    CRUD para Dicas, produtos e marcas <br>
                    Sistema auth <br>
                   Visualização geral pelo admin <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
