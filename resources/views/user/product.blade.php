@extends('layouts.user')
@section('content')
<main class="px-32 py-5">
    <div class="flex">
        <div class="w-1/4 px-5">
            <div class="category my-3 bg-white">
                <div class="px-5 py-1 rounded-lg bg-blue-400 text-white text-center text-2xl font-bold">Categories</div>
                <div class="">
                    @foreach ($category as $item)
                    <a href="{{ route('page.product.category', $item->id) }}" class="flex hover:bg-blue-100 px-5 py-3 text-center text-md font-bold border-b border-blue-400">
                        <i class="fas mr-3 fa-angle-double-right text-blue-300"></i>
                        <span>{{ $item->name }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="category mt-5 bg-white">
                <div class="px-5 py-1 rounded-lg bg-blue-400 text-white text-center text-2xl font-bold">Wilayah</div>
                <div class="">
                    <div class="">
                        @foreach ($regency as $item)
                        <a href="{{ route('page.product.wilayah', $item->id) }}" class="flex hover:bg-blue-100 px-5 py-3 text-center border-b border-blue-400" style="font-size: 0.7rem">
                            <i class="fas mr-3 fa-arrow-right text-blue-300"></i>
                            <span>{{ $item->name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/4">
            @if ($product->count()>0)
            <div class="product my-3 bg-white grid grid-cols-4 rounded-3xl shadow-2xl">
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
            @else
                <div class="product my-3 bg-white rounded-3xl shadow-2xl p-10">
                    <p class="text-gray-400">Layanan tidak ditemukan</p>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
