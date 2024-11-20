@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Транзакции</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Создать транзакцию</a>

    <table class="table">
        <thead>
            <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Описание</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-primary">Редактировать</a>
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection