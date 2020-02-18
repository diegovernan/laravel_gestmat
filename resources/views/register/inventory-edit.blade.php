@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h4 class="text-center">Atualizar</h4>

    @include('alerts.messages')

    <form method="post" action="{{ route('inventory.update', $inventory->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="inputProd">Produto</label>
            <select id="inputProd" class="form-control" name="product_id">
                <option value="none" selected disabled hidden>Selecionar...</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ $product->id == $inventory->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Input1">Quantidade mínima</label>
            <input type="number" class="form-control" id="Input1" name="minimum_quantity" value="{{ old('minimum_quantity') ?? $inventory->minimum_quantity }}">
        </div>

        <div class="form-group">
            <label for="Input2">Quantidade disponível</label>
            <input type="number" class="form-control" id="Input2" name="available_quantity" value="{{ old('available_quantity') ?? $inventory->available_quantity }}">
        </div>

        <div class="form-group">
            <label for="Input3">Quantidade vendida</label>
            <input type="number" class="form-control" id="Input3" name="sold_quantity" value="{{ old('sold_quantity') ?? $inventory->sold_quantity }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h4 class="text-center py-5">Informações do item</h4>

<div class="pb-5">
    <p>ID: {{ $inventory->id }}</p>
    <p>Nome: {{ $inventory->product->name }}</p>
    <p>Quantidade mínima: {{ $inventory->minimum_quantity }}</p>
    <p>Quantidade disponível: {{ $inventory->available_quantity }}</p>
    <p>Quantidade vendida: {{ $inventory->sold_quantity }}</p>

    <a href="{{ route('inventory') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection