@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Баланс</h1>
    <h2>Текущий баланс: {{ $balance->amount }} руб.</h2>

    <form method="POST" action="{{ route('balance.update') }}">
        @csrf
        <div class="form-group">
            <label for="amount">Прибавить 235 руб.</label>
            <input type="hidden" name="amount" value="235">
            <button type="submit" class="btn btn-success">Прибавить</button>
        </div>
    </form>

    <form method="POST" action="{{ route('balance.update') }}">
        @csrf
        <div class="form-group">
            <label for="amount">Убавить 50 руб.</label>
            <input type="hidden" name="amount" value="-50">
            <button type="submit" class="btn btn-danger">Убавить</button>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection