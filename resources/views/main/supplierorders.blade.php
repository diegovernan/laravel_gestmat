@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Solicitar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('supplierorders.store') }}">
    @csrf
    <div class="form-group">
        <label for="inputSupp">Fornecedor</label>
        <select id="inputSupp" class="form-control" name="supplier_id">
            <option value="none" selected disabled hidden>Selecionar...</option>
            @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="inputProd">Produto</label>
        <select id="inputProd" class="form-control" name="product_id">
            <option value="none" selected disabled hidden>Selecionar...</option>
            @foreach ($inventory_products as $item)
            <option value="{{ $item->product->id }}" {{ old('product_id') == $item->product->id ? 'selected' : '' }}>{{ $item->product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Input1">Quantidade</label>
        <input type="number" class="form-control" id="Input1" name="quantity" value="{{ old('quantity') }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<hr>

<h3 class="text-center py-3">Solicitações</h3>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Fornecedor</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Entrega</th>
                <th>Custo</th>
                <th>Recebido</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($supplierorders as $supplierorder)
            <tr>
                <td>{{ $supplierorder->id }}</td>
                <td>{{ $supplierorder->supplier->name }}</td>
                <td>{{ $supplierorder->product->name }}</td>
                <td>{{ $supplierorder->quantity }}</td>
                <td>{{ $supplierorder->updated_at->format('d/m/Y') }}</td>
                <td>R$ {{ number_format($supplierorder->price, 2, ',', '.') }}</td>
                <td>
                    @if ( $supplierorder->arrived == 0 )
                    <form method="post" action="{{ route('supplierorder.update', $supplierorder->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-danger btn-sm"><span data-feather="x-square"></span></button>
                    </form>
                    @else
                    <button class="btn btn-outline-success btn-sm"><span data-feather="check-circle"></span></button>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Nenhuma solicitação encontrada...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $supplierorders->links() }}
        </div>
    </div>
</div>

@endsection