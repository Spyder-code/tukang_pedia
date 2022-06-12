<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Repositories\TransactionDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailController extends Controller
{
    private $transactiondetailService;

    public function __construct(TransactionDetailService $transactiondetailService)
    {
        $this->transactiondetailService = $transactiondetailService;
    }


    public function index()
    {
        $is_confirm = false;
        if(Auth::id()!=1){
            $data = $this->transactiondetailService->all()->where('seller_id', Auth::id());
        }else{
            if(request('status')){
                $is_confirm = true;
                $data = $this->transactiondetailService->all()->where('status', 1);
            }else{
                $data = $this->transactiondetailService->all();
            }
        }
        return view('admin.transactiondetail.index', compact('data','is_confirm'));
    }


    public function create()
    {
        return view('admin.transactiondetail.create');
    }


    public function store(Request $request)
    {
        $this->transactiondetailService->store($request->all());
        return redirect()->route('transactiondetail.index')->with('success','TransactionDetail has success created');
    }


    public function show(TransactionDetail $transactiondetail)
    {
        return view('admin.transactiondetail.show', compact('transactiondetail'));
    }


    public function edit(TransactionDetail $transactiondetail)
    {
        return view('admin.transactiondetail.edit', compact('transactiondetail'));
    }


    public function update(Request $request, TransactionDetail $transactiondetail)
    {
        $data = $request->all();
        if($request->payment_proof){
            $image = $this->transactiondetailService->insertFile($request->payment_proof,'payment_proof', '.png');
            $data['payment_proof'] = $image;
        }
        $this->transactiondetailService->update($data,$transactiondetail->id);
        if ($request->status==1) {
            return back()->with('success','Pembayaran Berhasil');
        }elseif($request->status==2){
            return redirect()->route('transactiondetail.index')->with('success','Transaksi berhasil dikonfirmasi');
        }else{
            return back()->with('success','Transaction has success updated');
        }
    }


    public function destroy(TransactionDetail $transactiondetail)
    {
        $this->transactiondetailService->destroy($transactiondetail->id);
        return back()->with('success','TransactionDetail has success deleted');
    }

    public function updatePaymentMethod($id, Request $request)
    {
        $data = $request->payment_method;
        $transactionDetail = $this->transactiondetailService->updatePaymentMethod($id, $data);
        return back()->with('success','Payment Method has success updated');
    }
}
