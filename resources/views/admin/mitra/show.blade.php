@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>
                <form action="">
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Nama Mitra</label>
                            <input type="text" class="form-control" value="{{ $mitra->user->name }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ $mitra->user->email }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" value="{{ $mitra->nik }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">No. Telp</label>
                            <input type="text" class="form-control" value="{{ $mitra->user->phone }}" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Nama Industri</label>
                            <input type="text" class="form-control" value="{{ $mitra->name }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">Jenis</label>
                            <input type="text" class="form-control" value="{{ $mitra->type }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">NPWP</label>
                            <input type="text" class="form-control" value="{{ $mitra->npwp }}" readonly>
                        </div>
                        <div class="col-6">
                            <label for="">Skill</label>
                            <input type="text" class="form-control" value="{{ $mitra->skill }}" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="">Alamat</label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control" readonly>{{ $mitra->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-4">
                            <label for="">Portfolio data</label>
                            <a href="{{ $mitra->cv }}">
                                <i class="fas fa-file" style="font-size: 12pt"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <label for="">Sertifikat/Penghargaan</label>
                            <a href="{{ $mitra->file }}">
                                <i class="fas fa-file"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <label for="">Foto</label>
                            <a href="{{ $mitra->avatar }}">
                                <i class="fas fa-file"></i>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('mitra.index') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
