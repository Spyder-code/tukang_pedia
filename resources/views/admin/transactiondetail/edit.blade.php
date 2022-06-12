@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Konfirmasi Pesanan</h3>
                {!! Form::open(['route' => ['transactiondetail.update', $transactiondetail], 'method' => 'put']) !!}
                    @include('component.input',['input'=> Form::text('code',$transactiondetail->code,['class' => 'form-control', 'disabled']),'label'=> Form::label('code', 'code')])
                    @include('component.input',['input'=> Form::number('total',$transactiondetail->total,['class' => 'form-control', 'disabled']),'label'=> Form::label('total', 'total')])
                    @include('component.input',['input'=> Form::textarea('address',$transactiondetail->address,['class' => 'form-control', 'disabled']),'label'=> Form::label('address', 'address')])
                    @include('component.input',['input'=> Form::text('payment_method',$transactiondetail->payment_method,['class' => 'form-control', 'disabled']),'label'=> Form::label('payment_method', 'payment_method')])
                    <div class="row my-2">
                        <div class="col">
                            <img src="{{ $transactiondetail->payment_proof }}" alt="'Bukti pembayaran" class="img-fluid">
                        </div>
                    </div>
                    <button type="submit" name="status" value="2" onclick="return confirm('are you sure?')" class="btn btn-primary mx-1 text-white" title="Update">Konfirmasi</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
