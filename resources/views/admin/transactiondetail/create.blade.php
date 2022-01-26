@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['transactiondetail.store'], 'method' => 'post']) !!}
                    @include('component.input',['input'=> Form::text('code',null,['class' => 'form-control']),'label'=> Form::label('code', 'code')])
                    @include('component.input',['input'=> Form::number('total',null,['class' => 'form-control']),'label'=> Form::label('total', 'total')])
                    @include('component.input',['input'=> Form::textarea('address',null,['class' => 'form-control']),'label'=> Form::label('address', 'address')])
                    @include('component.input',['input'=> Form::text('payment_method',null,['class' => 'form-control']),'label'=> Form::label('payment_method', 'payment_method')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection