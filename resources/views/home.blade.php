@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h1>Добро пожаловать в финансовый трекер!</h1>
    <p>Это приложение поможет вам отслеживать ваши доходы и расходы.</p>

    <h2>Баланс: {{ $balance }}</h2>
    <h3>Транзакции</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Описание</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>График расходов и доходов</h3>
    <canvas id="myChart" width="400" height="200"></canvas>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Доходы', 'Расходы'],
                datasets: [{
                    label: 'Сумма',
                    data: [
                        {{ $transactions->where('category.type', 'income')->sum('amount') }},
                        {{ $transactions->where('category.type', 'expense')->sum('amount') }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection