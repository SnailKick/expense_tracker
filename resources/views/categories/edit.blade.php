@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать категорию</h1>
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="type">Тип</label>
            <select name="type" class="form-control">
                <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Доход</option>
                <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Расход</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection