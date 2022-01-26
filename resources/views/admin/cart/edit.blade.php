@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['cart.update', $cart], 'method' => 'put']) !!}
                     @include('component.input',['input'=> Form::select('user_id',$cart->user_id,['class' => 'form-control']),'label'=> Form::label('user_id', 'user_id')])
                    @include('component.input',['input'=> Form::select('product_id',$cart->product_id,['class' => 'form-control']),'label'=> Form::label('product_id', 'product_id')])
                    @include('component.input',['input'=> Form::number('qty',$cart->qty,['class' => 'form-control']),'label'=> Form::label('qty', 'qty')])
                    @include('component.input',['input'=> Form::number('total',$cart->total,['class' => 'form-control']),'label'=> Form::label('total', 'total')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-primary mx-1 text-white" title="Update">Update</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection