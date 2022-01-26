@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['cart.store'], 'method' => 'post']) !!}
                    @include('component.input',['input'=> Form::select('user_id',null,['class' => 'form-control']),'label'=> Form::label('user_id', 'user_id')])
                    @include('component.input',['input'=> Form::select('product_id',null,['class' => 'form-control']),'label'=> Form::label('product_id', 'product_id')])
                    @include('component.input',['input'=> Form::number('qty',null,['class' => 'form-control']),'label'=> Form::label('qty', 'qty')])
                    @include('component.input',['input'=> Form::number('total',null,['class' => 'form-control']),'label'=> Form::label('total', 'total')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection