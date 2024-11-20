@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать транзакцию</h1>
    <form method="POST" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $transaction->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Сумма</label>
            <input type="number" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control">{{ $transaction->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="transaction_date">Дата транзакции</label>
            <input type="date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection