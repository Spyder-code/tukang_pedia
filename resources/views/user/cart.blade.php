@extends('layouts.user')
@section('content')
<main class="py-5 mx-10">
    <div class="alamat rounded-3xl bg-white shadow-2xl px-10 py-5 flex justify-between">
        <div class="left">
            <p class="text-2xl text-blue-400"> <i class="fas fa-map-marked"></i> Alamat Pengiriman Tukang</p>
            <p class="font-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque quibusdam sapiente </p>
        </div>
        <div class="right">
            <button type="button" class="rounded-2xl px-4 py-1 bg-blue-500 text-white hover:bg-blue-200"><i class="fas fa-pen-alt"></i> Edit</button>
        </div>
    </div>

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
                <tr class="border-b-2 border-blue-300 mt-3">
                    <td class="flex">
                        <img src="assets/images/tukang.png" class="my-3 h-32">
                        <div class="my-auto ml-5">
                            <p class="text-2xl text-gray-400">Tukang Bangunan</p>
                            <p class="font-bold">PT. Spydercode </p>
                        </div>
                    </td>
                    <td>Rp. 100.000</td>
                    <td>1</td>
                    <td>Rp. 100.10000</td>
                </tr>
                <tr class="border-b-2 border-blue-300 mt-3">
                    <td class="flex">
                        <img src="assets/images/tukang.png" class="my-3 h-32">
                        <div class="my-auto ml-5">
                            <p class="text-2xl text-gray-400">Tukang Bangunan</p>
                            <p class="font-bold">PT. Spydercode </p>
                        </div>
                    </td>
                    <td>Rp. 100.000</td>
                    <td>1</td>
                    <td>Rp. 100.10000</td>
                </tr>
                <tr class="border-b-2 border-blue-300 mt-3 h-20">
                    <td class="flex">
                        <div class="text-blue-300 font-bold"><p>Opsi Pengiriman :</p></div>
                        <div class="ml-10">
                            <p class="font-bold">Reguler</p>
                            <p class="text-gray-600">Estimasi sampai tgl 20-21 January </p>
                        </div>
                    </td>
                    <td></td>
                    <td><button class="bg-blue-400 px-3 py-1 rounded-full text-sm text-white">Ubah</button></td>
                    <td>Rp. 100.10000</td>
                </tr>
                <tr class="h-32">
                    <td></td>
                    <td></td>
                    <td class="text-blue-300 text-2xl font-bold">Total Pembayaran</td>
                    <td>Rp. 100.10000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="alamat rounded-3xl bg-white shadow-2xl px-10 py-5 flex justify-between mt-5">
        <div class="left">
            <p class="text-2xl text-blue-400"> <i class="fas fa-dollar-sign"></i> Metode pembayaran</p>
            <p class="font-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque quibusdam sapiente </p>
        </div>
        <div class="right">
            <button type="button" class="rounded-2xl px-4 py-1 bg-blue-500 text-white hover:bg-blue-200"><i class="fas fa-pen-alt"></i> Edit</button>
        </div>
    </div>
</main>
@endsection
