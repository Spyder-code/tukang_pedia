@extends('layouts.user')
@section('content')
<main class="py-1 md:py-5 bg-white rounded-3xl shadow-2xl">
    <form action="{{ route('cart.store') }}" method="post" class="md-2 md:mx-20 flex flex-col md:flex-row my-3">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <div class="w-1/2 m-10 flex justify-center">
            <a href="{{ $product->image }}" class="image-link">
                <img src="{{ $product->image }}" alt="">
            </a>
        </div>
        <div class="w-3/4 ml-4 md:ml-1">
            <div class="my-4">
                <p class="text-3xl font-bold">{{ $product->title }}</p>
                <p class="my-2 text-2xl border-b-2 border-blue-400">Rp. {{ number_format($product->price,2,',','.') }}</p>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Daerah</span>
                    </div>
                    <div class="w-3/4 ml-8 md:ml-1">
                        <i class=" fas fa-car"></i> {{ $product->district->name }} {{ $product->regency->name }}, {{ $product->province->name }}
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Kuantitas</span>
                    </div>
                    <div class="w-3/4 ml-8 md:ml-1">
                        <input type="number" required name="qty" min="1" max="{{ $product->stock }}" class="w-full rounded-lg border border-blue-400 py-2 px-5"> <span>Tersedia : {{ $product->stock }} {{ $product->is_grouping==1?'Stock':'Orang' }}</span>
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Deskripsi</span>
                    </div>
                    <div class="w-3/4 ml-8 md:ml-1">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="flex mt-5 mr-5">
                    <div class="w-1/4">
                        <span class="font-bold text-lg">Profile</span>
                    </div>
                    <div class="w-3/4 ml-8 md:ml-1">
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
    <div class="md-2 md:mx-20 flex flex-col md:flex-row gap-5">
        <div class="w-1/2">
            <div class="flex justify-center gap-5 flex-wrap">
                @foreach ($product->images as $image)
                    <a href="{{ $image->path }}" class="image-link">
                        <img src="{{ $image->path }}" alt="" style="width: 150px; height:120px">
                    </a>
                @endforeach
            </div>
        </div>
        <div class="w-3/4 ml-4 md:ml-1">
            <div class="ml-16">
                @forelse ($product->transactions as $transaction)
                    @if (!Auth::user()->hasReview($product->id))
                        <form action="{{ route('review.store') }}" method="POST" class="text-center w-100 py-4">
                            @csrf
                            <input type="hidden" name="star" id="star-num">
                            <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                            <label>Tulis review</label>
                            <textarea name="comment" id="comment" cols="30" rows="5" class="p-5" style="border: 1px dashed black; width:100%"></textarea>
                            <div class="my-2">
                                <i class="fas fa-star text-grey-300" style="font-size: 2rem" id="star-1" onclick="changeStar(1)"></i>
                                <i class="fas fa-star text-grey-300" style="font-size: 2rem" id="star-2" onclick="changeStar(2)"></i>
                                <i class="fas fa-star text-grey-300" style="font-size: 2rem" id="star-3" onclick="changeStar(3)"></i>
                                <i class="fas fa-star text-grey-300" style="font-size: 2rem" id="star-4" onclick="changeStar(4)"></i>
                                <i class="fas fa-star text-grey-300" style="font-size: 2rem" id="star-5" onclick="changeStar(5)"></i>
                            </div>
                            <div class="my-2">
                                <button type="submit" class="px-5 py-2 bg-yellow-600 rounded-full hover:bg-yellow-400 text-white font-bold w-100">Kirim Review</button>
                            </div>
                        </form>
                    @endif
                    @if ($transaction->review)
                        <article>
                            <div class="flex items-center mb-4">
                                <img class="w-10 h-10 me-4 rounded-full" src="{{ $transaction->user->avatar }}" alt="">
                                <div class="font-medium dark:text-white">
                                    <p>{{ $transaction->user->name }} </p>
                                </div>
                            </div>
                            <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
                                @for ($i = 0; $i < $transaction->review->star; $i++)
                                    <i class="fas fa-star text-yellow-300"></i>
                                @endfor
                                <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $transaction->review->comment }}</h3>
                            </div>
                            <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed on <time datetime="{{ date('Y-m-d H:i', strtotime($transaction->review->created_at)) }}">{{ date('d/m/Y', strtotime($transaction->review->created_at)) }}</time></p></footer>
                        </article>
                    @else
                    <hr>
                    <div class="text-center w-100 py-4" style="border: 1px double black">
                        Tidak Ada Review!
                    </div>
                    @endif
                @empty
                <hr>
                <div class="text-center w-100 py-4" style="border: 1px double black">
                    Tidak Ada Review!
                </div>
                @endforelse
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    function changeStar(num){
        $('#star-1').removeClass('text-grey-300');
        $('#star-2').removeClass('text-grey-300');
        $('#star-3').removeClass('text-grey-300');
        $('#star-4').removeClass('text-grey-300');
        $('#star-5').removeClass('text-grey-300');
        for (let i = 1; i <= num ; i++) {
            $('#star-'+i).addClass('text-yellow-300');
        }
        $('#star-num').val(num);
    }
</script>
@endsection
