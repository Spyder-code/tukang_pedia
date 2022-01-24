@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['category.store'], 'method' => 'post']) !!}
                    @include('component.input',['input'=> Form::text('name',null,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
                    <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2" target="d_blank">Browsing Icon Name</a>
                    @include('component.input',['input'=> Form::text('icon',null,['class' => 'form-control']),'label'=> Form::label('icon', 'icon')])
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
