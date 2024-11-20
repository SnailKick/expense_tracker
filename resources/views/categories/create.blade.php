@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать категорию</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Тип</label>
            <select name="type" class="form-control">
                <option value="income">Доход</option>
                <option value="expense">Расход</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection