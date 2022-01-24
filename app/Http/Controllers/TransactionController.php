<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Repositories\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function index()
    {
        $data = $this->transactionService->all();
        return view('admin.transaction.index', compact('data'));
    }


    public function create()
    {
        return view('admin.transaction.create');
    }


    public function store(Request $request)
    {
        $this->transactionService->store($request->all());
        return redirect()->route('transaction.index')->with('success','Transaction has success created');
    }


    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }


    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }


    public function update(Request $request, Transaction $transaction)
    {
        $this->transactionService->update($request->all(),$transaction->id);
        return redirect()->route('transaction.index')->with('success','Transaction has success updated');
    }


    public function destroy(Transaction $transaction)
    {
        $this->transactionService->destroy($transaction->id);
        return redirect()->route('transaction.index')->with('success','Transaction has success deleted');
    }
}