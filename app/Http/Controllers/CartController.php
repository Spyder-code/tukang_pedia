<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Repositories\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }


    public function index()
    {
        $data = $this->cartService->all();
        return view('admin.cart.index', compact('data'));
    }


    public function create()
    {
        return view('admin.cart.create');
    }


    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['total'] = $request->qty * $request->price;
            $this->cartService->store($data);
            return redirect()->route('page.pesanan')->with('success','Cart has added');
        }else{
            return redirect()->route('page.account')->with('danger','Anda harus login terlebih dahulu');
        }
    }


    public function show(Cart $cart)
    {
        return view('admin.cart.show', compact('cart'));
    }


    public function edit(Cart $cart)
    {
        return view('admin.cart.edit', compact('cart'));
    }


    public function update(Request $request, Cart $cart)
    {
        $this->cartService->update($request->all(),$cart->id);
        return redirect()->route('cart.index')->with('success','Cart has success updated');
    }


    public function destroy(Cart $cart)
    {
        $this->cartService->destroy($cart->id);
        return redirect()->back()->with('success','Cart has success deleted');
    }
}
