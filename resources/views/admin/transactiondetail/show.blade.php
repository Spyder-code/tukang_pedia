@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::text('code',$transactiondetail->code,['class' => 'form-control']),'label'=> Form::label('code', 'code')])
                    @include('component.input',['input'=> Form::number('total',$transactiondetail->total,['class' => 'form-control']),'label'=> Form::label('total', 'total')])
                    @include('component.input',['input'=> Form::textarea('address',$transactiondetail->address,['class' => 'form-control']),'label'=> Form::label('address', 'address')])
                    @include('component.input',['input'=> Form::text('payment_method',$transactiondetail->payment_method,['class' => 'form-control']),'label'=> Form::label('payment_method', 'payment_method')])
               
            </div>
        </div>
    </div>
</div>
@endsection