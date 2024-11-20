@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать транзакцию</h1>
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Сумма</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="transaction_date">Дата транзакции</label>
            <input type="date" name="transaction_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection