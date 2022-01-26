@extends('layouts.user')
@section('content')
<main class="py-5">
    <form action="{{ route('cart.store') }}" method="post" class="mx-20 flex my-3 bg-white rounded-3xl shadow-2xl">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <div class="w-1/2 m-10 flex justify-center">
            <img src="{{ $product->image }}" alt="">
        </div>
        <div class="w-3/4">
            <div class="my-4">
                <p class="text-3xl font-bold">{{ $product->title }}</p>
                <p class="mb-2 text-2xl border-b-2 border-blue-400">Rp. {{ number_format($product->price,2,',','.') }}</p>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Daerah</span>
                    </div>
                    <div class="w-3/4">
                        <i class=" fas fa-car"></i> {{ $product->district->name }} {{ $product->regency->name }}, {{ $product->province->name }}
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Kuantitas</span>
                    </div>
                    <div class="w-3/4">
                        <input type="number" name="qty" min="1" max="{{ $product->stock }}" class="w-full rounded-lg border border-blue-400 py-2 px-5"> <span>Tersedia : {{ $product->stock }} Orang</span>
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Deskripsi</span>
                    </div>
                    <div class="w-3/4">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Profile</span>
                    </div>
                    <div class="w-3/4">
                        <table class="table-auto">
                            <tbody>
                                <tr>
                                    <td width="200px">Nama Vendor</td>
                                    <td>:</td>
                                    <td>{{ $product->user->mitra->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori Pekerjaan</td>
                                    <td>:</td>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Wilayah Pengerjaan</td>
                                    <td>:</td>
                                    <td>{{ $product->district->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="my-5">
                    <button type="submit" class="px-5 py-2 bg-blue-600 rounded-full hover:bg-blue-400 text-white font-bold">Checkout</button>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
