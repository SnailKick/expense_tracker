<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->get();
        $balance = $transactions->sum('amount');

        return view('dashboard', compact('transactions', 'balance'));
    }
}