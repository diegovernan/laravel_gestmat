@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Atualizar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('profile.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input1">Nome</label>
        <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
    </div>

    <div class="form-group">
        <label for="Input2">E-mail</label>
        <input type="text" class="form-control" id="Input2" name="email" value="{{ old('email') ?? $user->email }}">
    </div>

    <div class="text-center pb-5">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

@endsection