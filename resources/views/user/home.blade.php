@extends('layouts.user')
@section('content')
<main class="px-32 py-5">
    <div class="flex">
        <div class="w-1/4 px-5">
            <div class="category my-3 bg-white">
                <div class="px-5 py-1 rounded-lg bg-blue-400 text-white text-center text-xl font-bold">Categories</div>
                <div class="">
                    @foreach ($category as $item)
                    <a href="{{ route('page.product.category', $item->id) }}" class="flex hover:bg-blue-100 px-5 py-3 text-center text-md font-bold border-b border-blue-400">
                        <i class="fas mr-3 fa-{{ $item->icon }} text-blue-300"></i>
                        <span>{{ $item->name }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-3/4">
            <div class="banner flex h-full" style="background-image: url('{{ asset('/') }}images/banner.png'); height: 418px;">
                <div class="my-auto ml-20">
                    <span class="text-gray-400">TOP STARTUP</span>
                    <p class="text-2xl font-bold text-gray-400">NEW STARTUP</p>
                    <p class="text-gray-400 mb-5">TUKANGPEDIA</p>
                    <a href="" class="px-5 py-2 bg-blue-600 rounded-full text-lg text-white font-bold">Download App</a>
                </div>
            </div>
            <div class="product my-3 bg-white grid grid-cols-4">
                @foreach ($product as $item)
                <div class="my-4 text-center">
                    <div class="flex justify-center">
                        <img src="{{ $item->image }}" style="height: 141px; width: 171px;">
                    </div>
                    <p class="text-lg font-bold">{{ $item->title }}</p>
                    <p class="mb-2 uang">Rp. {{ number_format($item->price,2,',','.') }}</p>
                    <a href="{{ route('page.product.detail',$item) }}" class="bg-blue-600 px-3 py-1 text-white rounded-full hover:bg-blue-300">Order</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
