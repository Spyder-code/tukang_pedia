@extends('layouts.user')
@section('content')
<div id="confirm-respon" class="flex items-center justify-center">
    <div class="relative">
        <img src="{{ asset('images/loading.gif') }}" alt="">
        <p class="text-2xl text-center relative" style="top: -200px">Checking Payment</p>
    </div>
</div>
<div id="detail" class="flex items-center justify-center min-h-screen bg-gray-100 py-5">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif
    <div class="w-3/5 bg-white shadow-lg">
        <div class="flex justify-between p-4">
            <div>
                <h1 class="text-3xl italic font-extrabold tracking-widest text-indigo-500">Tukang Pedia</h1>
                <p class="text-base">If account is not paid within 7 days the credits details supplied as
                    confirmation.</p>
            </div>
            <div class="p-2">
                <ul class="flex">
                    <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                        <strong class="text-lg text-{{ $detailTransaction->status==0?'red':'green' }}-400">
                            {{ $detailTransaction->status==0?'Belum dibayar':'Lunas' }}
                        </strong>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>
        <div class="flex justify-between p-4">
            <div>
                <h6 class="font-bold">Order Date : <span class="text-sm font-medium"> {{ date('d/m/Y', strtotime($detailTransaction->created_at)) }}</span></h6>
                <h6 class="font-bold">Order ID : <span class="text-sm font-medium"> {{ $detailTransaction->code }}</span></h6>
            </div>
            <div class="w-40">
                <address class="text-sm">
                    <span class="font-bold"> Customer : </span>
                    <span class="text-sm"> {{ $detailTransaction->user->name }}</span>
                    <span class="text-sm"> {{ $detailTransaction->address }}</span>
                </address>
            </div>
            <div class="w-40">
                <address class="text-sm">
                    <span class="font-bold">Tanggal kedatangan :</span>
                    <span class="text-sm"> {{ date('d/M/Y', strtotime($detailTransaction->arrive)) }}</span>
                </address>
            </div>
            <div></div>
        </div>
        <div class="flex justify-center p-4">
            <div class="border-b border-gray-200 shadow">
                <table class="">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                #
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Layanan
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Harga
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Jumlah
                            </th>
                            <th class="px-4 py-2 text-xs text-gray-500 ">
                                Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($transaction as $item)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $item->product->title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $item->product->price }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $item->qty }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $item->total }}</div>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="">
                            <td colspan="3"></td>
                            <td class="text-sm font-bold">Total</td>
                            <td class="text-sm font-bold tracking-wider"><b>Rp. {{ number_format($transaction->sum('total'),2,',','.') }}</b></td>
                        </tr>
                        <!--end tr-->

                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between p-4">
            <div>
                <h3 class="text-xl">Terms And Condition :</h3>
                <ul class="text-xs list-disc list-inside">
                    <li>All accounts are to be paid within 7 days from receipt of invoice.</li>
                    <li>To be paid by cheque or credit card or direct payment online.</li>
                    <li>If account is not paid within 7 days the credits details supplied.</li>
                </ul>
            </div>
            <div class="p-4">
                <h3>Official</h3>
                <div class="text-4xl italic text-indigo-500">TPedia</div>
            </div>
        </div>
        <div class="w-full h-0.5 bg-indigo-500"></div>

        @if ($detailTransaction->status==0)
        <div class="p-4 grid grid-cols-2">
            <div class="">
                <p>Harap lakukan pembayaran pada:</p><br>
                <img src="{{ asset('images/QRCode.png') }}" alt="Code" style="height:200px; width:200px;">
            </div>
            <div class="">
                <h3 class="text-xl">Cara Pembayaran:</h3>
                <ol class="text-xs list-disc list-inside">
                    <li>Buka aplikasi E-Money</li>
                    <li>Pilih menu bayar</li>
                    <li>Scan QRCode disamping</li>
                    <li>Jika sudah melakukan pembayaran, Klik tombol "Konfirmasi Pembayaran" dibawah</li>
                </ol>
                <br>
                <hr>
                <form action="{{ route('transactiondetail.update',$detailTransaction) }}" method="POST" class="mt-2" id="form1" name="form1">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <button type="button" id="konfirmasi" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Konfirmasi Pembayaran</button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $('#confirm-respon').hide();
    $('#konfirmasi').click(function (e) {
        $('#confirm-respon').show();
        $('#detail').hide();
        setTimeout(() => {
            $('#form1').submit();
        }, 5000);
    });
</script>
@endsection