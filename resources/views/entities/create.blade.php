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
                <input type="text" name="trading_name" value="{{ old('trading_name') }}" class="form-control" placeholder="Name" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cpf/Cnpj:</strong>
                <input type="text" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" class="form-control" placeholder="Ex.:012.255.555-88" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="type_registry">Tipo de Registro</label>
                <select class="form-control" name="type_registry" id="type_registry" required>
                    <option value="" selected>Selecione uma opção*</option>
                    <option value="client" {{ old('type_registry') == 'client' ? 'selected' : '' }}>
                        Cliente
                    </option>
                    <option value="provider" {{ old('type_registry') == 'provider' ? 'selected' : '' }}>
                        Fornecedor
                    </option>
                    <option value="both" {{ old('type_registry') == 'both' ? 'selected' : '' }}>
                        Ambos
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="type_entity">Tipo de Entidade</label>
                <select class="form-control" name="type_entity" id="type_entity" required>
                    <option value="" selected>Selecione uma opção*</option>
                    <option value="legal" {{ old('type_entity') == 'legal' ? 'selected' : '' }}>
                        Pessoa Jurídica
                    </option>
                    <option value="natural" {{ old('type_entity') == 'natural' ? 'selected' : '' }}>
                        Pessoa Física
                    </option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
@endsection