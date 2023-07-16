@extends('stocks.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Editar produto</div>
  <div class="card-body">
       
      <form action="{{ url('stock/' .$stocks->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$stocks->id}}" id="id" />
        <label>Produto</label></br>
        <input type="text" name="Product" id="Product" value="{{$stocks->Product}}" class="form-control"></br>
        <label>Preço</label></br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="text" name="Price" id="Price" value="{{$stocks->Price}}" class="form-control"></br>
        </div>
        <label>Quantidade</label></br>
        <input type="text" name="Amount" id="Amount" value="{{$stocks->Amount}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>

<script>
    // Adiciona um manipulador de eventos input aos campos de preço e quantidade
    document.getElementById('Price').addEventListener('input', handleNumericInput);
    document.getElementById('Amount').addEventListener('input', handleNumericInput);

    function handleNumericInput(event) {
        // Verifica se o valor digitado é válido (apenas números)
        if (event.target.value && !/^[0-9]*$/.test(event.target.value)) {
            // Remove o último caractere digitado se for inválido
            event.target.value = event.target.value.slice(0, -1);
        }
    }
</script>
  
@stop
