<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('category')->where('user_id', auth()->id())->get();
        $balance = $transactions->where('category.type', 'income')->sum('amount') - $transactions->where('category.type', 'expense')->sum('amount');
        return view('home', compact('transactions', 'balance'));
    }
}