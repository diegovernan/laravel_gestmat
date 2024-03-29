@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Atualizar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('customer.update', $customer->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input1">Nome</label>
        <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $customer->name }}">
    </div>

    <div class="form-group">
        <label for="Input2">Telefone</label>
        <input type="text" class="form-control phone" id="Input2" name="phone" value="{{ old('phone') ?? $customer->phone }}">
    </div>

    <div class="form-group">
        <label for="Input2">E-mail</label>
        <input type="email" class="form-control" id="Input2" name="email" value="{{ old('email') ?? $customer->email }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<hr>

<h3 class="text-center py-3">Informações do cliente</h3>

<div class="pb-5">
    <p>ID: {{ $customer->id }}</p>
    <p>Nome: {{ $customer->name }}</p>
    <p>Telefone: {{ $customer->phone }}</p>
    <p>E-mail: {{ $customer->email }}</p>

    <div class="text-center">
        <a href="{{ route('customers') }}" type="button" class="btn btn-dark">Voltar</a>
    </div>
</div>

@endsection