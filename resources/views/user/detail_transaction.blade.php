@extends('layouts.user')
@section('content')
    <main class="py-5 mx-10">
        <a href="{{ route('page.transaksi') }}" class="rounded-2xl px-4 py-3 bg-blue-700 text-white w-full hover:bg-blue-200"> Kembali</a>
        <div class="alamat rounded-3xl bg-white shadow-2xl px-10 py-5 flex mt-5">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-left">
                            <p class="text-md"> <i class="fas fa-user-tag"></i> Tukang dipesan</p>
                        </th>
                        <th class="text-left">Harga/org</th>
                        <th class="text-left">Jumlah</th>
                        <th class="text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $item)
                    <tr class="border-b-2 border-blue-300 mt-3">
                        <td class="flex">
                            <img src="{{ $item->product->image }}" class="my-3 h-32">
                            <div class="my-auto ml-5">
                                <p class="text-2xl text-gray-400">{{ $item->product->name }}</p>
                                <p class="font-bold">{{ $item->product->user->mitra->name }}</p>
                            </div>
                        </td>
                        <td>Rp. {{ number_format($item->product->price,2,',','.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->total,2,',','.') }}</td>
                    </tr>
                    @endforeach
                    <tr class="border-b-2 border-blue-300 mt-3 h-20">
                        <td class="flex items-center justify-center mt-3">
                            <div class="text-blue-300 font-bold"><p>Jadwal Pengerjaan :</p></div>
                            <div class="ml-10">
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="date" disabled name="arrive" value="{{ $detailTransaction->arrive }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" required>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td colspan="2">Jadwal untuk kedatangan layanan</td>
                    </tr>
                    <tr class="h-32">
                        <td></td>
                        <td></td>
                        <td class="text-blue-300 text-2xl font-bold">Total Pembayaran</td>
                        <td>Rp. {{ number_format($transaction->sum('total'),2,',','.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="alamat rounded-3xl bg-white shadow-2xl px-10 py-5 my-5">
            <p class="text-2xl text-blue-400"> <i class="fas fa-map-marked"></i> Alamat Pemesanan</p>
            <textarea name="address" id="address" cols="30" rows="3" class="mt-3 w-full border border-blue-200 px-10 py-1" readonly>{{ $detailTransaction->address }}</textarea>
        </div>

        <div class="alamat rounded-3xl bg-white shadow-2xl px-10 py-5 mt-5">
            <div class="left">
                <p class="text-2xl text-blue-400"> <i class="fas fa-dollar-sign"></i> Metode pembayaran</p>
                <select id="countries" disabled name="payment_method" class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Transfer Bank" {{ $detailTransaction->payment_method=='Transfer Bank'?'selected':'' }}>Transfer Bank</option>
                    <option value="E-Money" {{ $detailTransaction->payment_method=='E-Money'?'selected':'' }}>E-Monney</option>
                </select>
            </div>
        </div>
    </main>
</form>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>
@endsection
