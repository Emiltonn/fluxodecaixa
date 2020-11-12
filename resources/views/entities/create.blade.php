@extends('master.template')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Nova Entidade</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('entities.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Há algo de errado com a sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('entities.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="trading_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cpf/Cnpj:</strong>
                <textarea class="form-control" style="height:150px" name="cpf_cnpj" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="type_registry">Tipo de Registro</label>
                <select class="form-control" id="type_registry">
                    <option value="client">Cliente</option>
                    <option value="provider">Fornecedor</option>
                    <option value="both">Ambos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type_entity">Tipo de Entidade</label>
                <select class="form-control" id="type_entity">
                    <option value="natural">Pessoa Jurídica</option>
                    <option value="legal">Pessoa Física</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
@endsection