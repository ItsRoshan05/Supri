<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan Carbon di-import

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all()->map(function ($transaction) {
            // Konversi string ke Carbon instance
            $transaction->formatted_date = Carbon::parse($transaction->transaction_date)->format('d-m-Y');
            $transaction->formatted_total = number_format($transaction->total, 0, ',', '.');
            return $transaction;
        });

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_date' => 'required|date',
            'total' => 'required|numeric',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'transaction_date' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
