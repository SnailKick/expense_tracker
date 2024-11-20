<?php
namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        // Извлекаем баланс для текущего авторизованного пользователя
        $balance = Balance::where('user_id', auth()->id())->first();

        // Передаем данные в представление
        return view('balance.index', compact('balance'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $balance = Balance::where('user_id', auth()->id())->first();
        $newAmount = $balance->amount + $request->amount;

        if ($newAmount < 0) {
            return redirect()->route('balance.index')->with('error', 'У вас недостаточно средств!');
        }

        $balance->update([
            'amount' => $newAmount,
        ]);

        return redirect()->route('balance.index')->with('success', 'Баланс успешно обновлен!');
    }
}