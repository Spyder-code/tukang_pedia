@extends('layouts.user')
@section('content')
<main class="px-3 md:px-10 py-5">
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
                <h2 class="text-blue-600 text-3xl font-bold text-center">Register Mitra</h2>
                <hr>
                <form action="{{ route('mitra.store') }}" method="POST" class="mt-10" enctype="multipart/form-data">
                    @csrf
                    <p class="text-2xl text-blue-400">Data Pribadi</p>
                    <div class="grid grid-cols-2">
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama lengkap sesuai KTP <sup class="text-red-400">*</sup></label>
                            <input type="text" value="{{ old('user.name',Auth::user()->name) }}" name="user['name']" required id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIK <sup class="text-red-400">*</sup></label>
                            <input type="text" name="nik" value="{{ old('nik') }}" required id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 my-2">
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email <sup class="text-red-400">*</sup></label>
                            <input type="text" value="{{ old('user.email',Auth::user()->email) }}" readonly name="user['email']" required id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. Telp <sup class="text-red-400">*</sup></label>
                            <input type="text" name="user['phone']" value="{{ old('user.phone',Auth::user()->phone) }}" required id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                    <p class="text-2xl text-blue-400 mt-10">Data Perusahaan atau Industri</p>
                    <div class="grid grid-cols-2">
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama CV/PT atau Identitas lain <sup class="text-red-400">*</sup></label>
                            <input type="text" name="name" value="{{ old('name') }}" required id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="my-1 pl-4">
                            <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis Industri <sup class="text-red-400">*</sup></label>
                            <select id="skill" name="type" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Jenis</option>
                                <option {{ old('type')=='perusahaan'?'selected':'' }} value="perusahaan">CV/PT Atau Perusahaan</option>
                                <option {{ old('type')=='perorangan'?'selected':'' }} value="perorangan">Perorangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="my-1 pr-4">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NPWP</label>
                            <input type="text" name="npwp" value="{{ old('npwp') }}" id="base-input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="my-1 pl-4">
                            <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Spesialis Keahlian <sup class="text-red-400">*</sup></label>
                            <select id="skill" name="skill" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Keahlian</option>
                                @foreach ($category as $item)
                                    <option {{ old('skill')==$item->name?'selected':'' }} value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="my-1">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat <sup class="text-red-400">*</sup></label>
                        <textarea id="message" name="address" rows="3" class="block p-2 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('address') }}</textarea>
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="my-1 pr-4">
                            <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Provinsi <sup class="text-red-400">*</sup></label>
                            <select id="provinsi" name="provinsi" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-1 pl-4">
                            <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kabupaten <sup class="text-red-400">*</sup></label>
                            <select id="kabupaten" name="kabupaten" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih kabupaten</option>
                            </select>
                        </div>
                        <div class="my-1 pl-4">
                            <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kecamatan <sup class="text-red-400">*</sup></label>
                            <select id="kecamatan" name="kecamatan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih kecamatan</option>
                            </select>
                        </div>
                    </div>

                    <p class="text-2xl text-blue-400 mt-10">Dokumen</p>
                    <div class="my-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">CV (PDF)<sup class="text-red-400">*</sup></label>
                        <input class="block w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="portfolio" id="user_avatar" type="file" name="cv">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="portfolio">Portfolio data diri anda</div>
                    </div>
                    <div class="my-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="pendukung">File Pendukung (PDF)</label>
                        <input class="block w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="pendukung" id="pendukung" type="file" name="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="pendukung">Sertifikat/Penghargaan CV/PT atau yang berhubungan dengan layanan anda</div>
                    </div>
                    <div class="my-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="avatar">Foto Mitra </label>
                        <input class="block w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="avatar" id="avatar" type="file" name="avatar">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="avatar">Foto diri anda</div>
                    </div>
                    <div class="my-5">
                        <span class="text-justify text-xs">Dengan melakukan submit, Anda menyetujui telah mengisi isian form dan portofolio dengan sebenar-benarnya menggunakan data yang valid , jika dikemudian hari ditemukan tindak kecurangan terhadap data-data yang kami gunakan maka kami siap untuk diproses oleh pihak TukangPedia sebagaimana mestinya</span>
                    </div>
                    <div class="my-5">
                        <button type="submit" onclick="return confirm('are yous sure?')" class="px-10 py-2 text-white font-bold text-lg bg-blue-600 rounded-full">Daftar Mitra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    <script>
        $(function(){
            $('#provinsi').change(function(){
                var provinsi_id = $(this).val();
                $.ajax({
                    url: "{{ url('/api/regency') }}/"+provinsi_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('#kabupaten').empty();
                        $('#kabupaten').append('<option selected disabled>Pilih kabupaten</option>');
                        $.each(data, function(key, value){
                            $('#kabupaten').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            });

            $('#kabupaten').change(function(){
                var kabupaten_id = $(this).val();
                $.ajax({
                    url: "{{ url('/api/district') }}/"+kabupaten_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option selected disabled>Pilih kecamatan</option>');
                        $.each(data, function(key, value){
                            $('#kecamatan').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
