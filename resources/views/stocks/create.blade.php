@extends('stocks.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Adicionar Produto</div>
  <div class="card-body">
       
      <form action="{{ url('stock') }}" method="post">
        {!! csrf_field() !!}
        <label>Produto</label></br>
        <input type="text" name="Product" id="Product" class="form-control"></br>
        <label>Preço</label></br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="text" name="Price" id="Price" class="form-control"></br>
        </div>
        <label>Quantidade</label></br>
        <input type="text" name="Amount" id="Amount" class="form-control"></br>
        <input type="submit" value="Salvar" class="btn btn-success"></br>
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
