<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Repositories\CartService;
use App\Repositories\TransactionDetailService;
use App\Repositories\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private $transactionService;
    private $cartService;
    private $transactionDetailService;

    public function __construct(TransactionService $transactionService, CartService $cartService, TransactionDetailService $transactionDetailService)
    {
        $this->cartService = $cartService;
        $this->transactionDetailService = $transactionDetailService;
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
        $cart = $this->cartService->all()->where('user_id', Auth::id());
        if ($cart->count() == 0) {
            return back()->with('danger','Anda harus membeli produk terlebih dahulu');
        }
        $data = $request->all();
        foreach ($cart as $item ) {
        $data['code'] = 'TRX'.rand(11111,999999).Auth::id();
        $data['status'] = 0;
        $data['total'] = $item->total;
        $data['user_id'] = Auth::id();
        $transaction = $this->transactionDetailService->store($data);
            $item_transaction = array();
            $item_transaction['user_id'] = $item->user_id;
            $item_transaction['product_id'] = $item->product_id;
            $item_transaction['qty'] = $item->qty;
            $item_transaction['total'] = $item->total;
            $item_transaction['transaction_detail_id'] = $transaction->id;
            $this->transactionService->store($item_transaction);
        }
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('page.transaksi')->with('success','Transaction has success created');
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
