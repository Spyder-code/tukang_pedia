@extends('layouts.user')
@section('content')
<main class="px-10 py-5">
    <div class="text-gray-400">HOME / MITRA REGISTRATION</div>
    <div class="py-20 px-10 bg-white shadow-2xl rounded border-t border-blue-200 mt-5">
        @if ($errors->any())
            <div class="bg-blue-200 px-10 py-4 mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="">
            <div class="mx-5">
                <h2 class="text-blue-600 text-3xl font-bold">Register Mitra</h2>
                <hr>
                <form action="{{ route('mitra.store') }}" method="POST" class="mt-10" enctype="multipart/form-data">
                    @csrf
                    <div class="my-5">
                        <label for="name">Nama CV/PT atau Identitas lain<sup class="text-red-400">*</sup></label>
                        <input type="text" name="name" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="password">Alamat <sup class="text-red-400">*</sup></label>
                        <textarea name="address" id="address" cols="30" rows="3" class="w-full border border-blue-200 px-10 py-1"></textarea>
                    </div>
                    <div class="my-5 grid grid-cols-2">
                        <div>
                            <label for="password">Portfolio <sup class="text-red-400">*</sup></label>
                            <input type="file" name="cv">
                        </div>
                        <div>
                            <label for="password">Foto Mitra <sup class="text-red-400">*</sup></label>
                            <input type="file" name="avatar">
                        </div>
                    </div>
                    <div class="my-5">
                        <span class="text-justify text-xs">Dengan melakukan submit, Anda menyetujui telah mengisi isian form dan portofolio dengan sebenar-benarnya menggunakan data yang valid , jika dikemudian hari ditemukan tindak kecurangan terhadap data-data yang kami gunakan maka kami siap untuk diproses oleh pihak TukangPedia sebagaimana mestinya</span>
                    </div>
                    <div class="my-5">
                        <button type="submit" class="px-10 py-2 text-white font-bold text-lg bg-blue-600 rounded-full">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
