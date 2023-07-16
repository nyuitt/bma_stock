@extends('stocks.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>BMA - Stock</h2>
                    </div>
                    
                    <div class="card-body">
                        <a href="{{ url('/stock/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Adicionar produto
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $item)
                                    <tr>
                                        <td>{{ $item->iteration }}</td>
                                        <td>{{ $item->Product }}</td>
                                        <td>R$ {{ $item->Price }}</td>
                                        <td>{{ $item->Amount }}</td>
  
                                        <td>
                                            <a href="{{ url('/stock/' . $item->id) }}" title="Ver Produto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/stock/' . $item->id . '/edit') }}" title="Editar produto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
  
                                            <form method="POST" action="{{ url('/stock' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Deletar produto" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection