@extends('layouts.user')
@section('content')
<div id="confirm-respon" class="flex items-center justify-center">
    <div class="relative">
        <img src="{{ asset('images/loading.gif') }}" alt="">
        <p class="text-2xl text-center relative" style="top: -200px">Checking Payment</p>
    </div>
</div>
@if (session('success'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif
<div id="detail" class="flex items-center justify-center min-h-screen bg-gray-100 py-5">
    <div class="overflow-x-auto w-full md:w-3/5 bg-white shadow-lg mx-2">
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

        @if ($detailTransaction->status==0 && Auth::id()==$detailTransaction->user_id)
        <div class="p-4 grid grid-cols-2">
            <div class="">
                @if ($detailTransaction->payment_method=='Transfer Bank')
                <p>Pilih bank tujuan:</p><br>
                    <fieldset>
                        <legend class="sr-only">Bank</legend>

                        <div class="flex items-center mb-4">
                            <input id="bank-option-1" type="radio" name="bank" checked value="bri" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-1" aria-describedby="bank-option-1" checked>
                            <label for="bank-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <img src="{{ asset('images/bri.png') }}" class=" h-10">  BRI (Bank Rakyat Indonesia)
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="bank-option-2" type="radio" name="bank" value="bni" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-2" aria-describedby="bank-option-2">
                            <label for="bank-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <img src="{{ asset('images/bni.png') }}" class=" h-10"> BNI (Bank Negara Indonesia)
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="bank-option-3" type="radio" name="bank" value="mandiri" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-3" aria-describedby="bank-option-3">
                            <label for="bank-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <img src="{{ asset('images/mandiri.png') }}" class=" h-10"> Mandiri (Bank Mandiri)
                            </label>
                        </div>

                        <div class="flex items-center mb-4">
                            <input id="bank-option-4" type="radio" name="bank" value="bca" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-4" aria-describedby="bank-option-4">
                            <label for="bank-option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <img src="{{ asset('images/bca.png') }}" class=" h-10"> BCA (Bank Central Asia)
                            </label>
                        </div>
                    </fieldset>
                @else
                <p>Pilih E-Monney tujuan:</p><br>
                <fieldset>
                    <legend class="sr-only">E-Monney</legend>

                    <div class="flex items-center mb-4">
                        <input id="bank-option-1" type="radio" name="bank" value="ovo" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-1" aria-describedby="bank-option-1" checked>
                        <label for="bank-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <img src="{{ asset('images/ovo.png') }}" class=" h-10">  OVO (OVO)
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="bank-option-2" type="radio" name="bank" value="gopay" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-2" aria-describedby="bank-option-2">
                        <label for="bank-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <img src="{{ asset('images/gopay1.png') }}" class=" h-10"> Gopay (Gopay)
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="bank-option-3" type="radio" name="bank" value="dana" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-3" aria-describedby="bank-option-3">
                        <label for="bank-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <img src="{{ asset('images/dana.jpg') }}" class=" h-10"> Dana (Dana)
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="bank-option-4" type="radio" name="bank" value="shopee" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="bank-option-4" aria-describedby="bank-option-4">
                        <label for="bank-option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <img src="{{ asset('images/shopee.png') }}" class=" h-10"> ShopeePay (Shopeepay)
                        </label>
                    </div>
                </fieldset>
                @endif
            </div>
            <div class="">
                <h3 class="text-xl">Cara Pembayaran:</h3>
                @if ($detailTransaction->payment_method == 'Transfer Bank')
                <ol class="text-xs list-disc list-inside">
                    <li>Masukkan kartu ATM ke mesin ATM Bank</li>
                    <li>Masukkan PIN</li>
                    <li>Pilih Menu Transfer</li>
                    <li>Masukkan kode Bank <b id="kode-bank">(002)</b> dan nomor rekening tujuan <b id="no-rek">(8850701408)</b></li>
                    <li>Periksa kembali, apakah nomor rekening sudah sesuai dengan nama "Tukang Pedia Official"</li>
                    <li>Jika sudah melakukan pembayaran, Klik tombol "Konfirmasi Pembayaran" dibawah</li>
                </ol>
                @else
                <ol class="text-xs list-disc list-inside">
                    <li>Buka aplikasi E-Money</li>
                    <li>Pilih menu bayar</li>
                    <li>Scan QRCode dibawah</li>
                    <li>Transfer uang sesuai faktur pembayaran diatas</li>
                    <li>Jika sudah melakukan pembayaran, Klik tombol "Konfirmasi Pembayaran" dibawah</li>
                </ol>
                <img src="{{ asset('images/QRCode.png') }}" class="h-36 mt-3">
                @endif
                <br>
                <hr>
                <form action="{{ route('transactiondetail.update',$detailTransaction) }}" method="POST" class="mt-2" id="form1" name="form1" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    {{-- input file tailwind --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Bukti Pembayaran
                            </label>
                            <input type="file" name="payment_proof" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" required>
                        </div>
                    </div>
                    <button type="submit" id="konfirmasi" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Konfirmasi Pembayaran</button>
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
    // $('#konfirmasi').click(function (e) {
    //     $('#confirm-respon').show();
    //     $('#detail').hide();
    //     setTimeout(() => {
    //         $('#form1').submit();
    //     }, 5000);
    // });

    $('input[type=radio][name=bank]').change(function() {
    if (this.value == 'bni') {
        var kode = '(009)';
        var norek = '(145635789)'
    }
    else if (this.value == 'bri') {
        var kode = '(002)';
        var norek = '(12133214)'
    }
    else if (this.value == 'bca') {
        var kode = '(003)';
        var norek = '(36694178)'
    }
    else if (this.value == 'mandiri') {
        var kode = '(008)';
        var norek = '(14523432)'
    }
    $('#kode-bank').html(kode);
    $('#no-rek').html(norek);
});
</script>
@endsection
