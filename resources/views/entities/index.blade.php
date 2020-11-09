@extends('master.template')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Entidades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('entities.create') }}"> Adicionar nova Entidade</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Cpf/Cnpj</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($entities as $entity)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $entity->trading_name }}</td>
            <td>{{ $entity->cpf_cnpj }}</td>
            <td>
                <form action="{{ route('entities.destroy',$entity->identity) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('entities.show',$entity->identity) }}"><span data-feather="eye"></span></a>
    
                    <a class="btn btn-primary" href="{{ route('entities.edit',$entity->identity) }}"><span data-feather="edit"></span></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><span data-feather="trash-2"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $entities->links() !!}
      
@endsection