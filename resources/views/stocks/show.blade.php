@extends('stocks.layout')
@section('content')

<!-- Adicione este código na página show -->
<style>
    #app {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999;
    }
</style>
  
<div class="card" style="margin:100px;">
  <div class="card-header">Produto</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-title">Produto : {{ $stocks->Product }}</p>
        <p class="card-text">Preço R$: {{ $stocks->Price }}</p>
        <p class="card-text">Quantidade : {{ $stocks->Amount }}</p>
  </div>
    </hr>
  </div>
</div>