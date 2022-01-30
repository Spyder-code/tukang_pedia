@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['subcategory.store'], 'method' => 'post']) !!}
                    @include('component.input',['input'=> Form::select('category_id',$category,1,['class' => 'form-control']),'label'=> Form::label('category_id', 'Kategori')])
                    @include('component.input',['input'=> Form::text('name',null,['class' => 'form-control']),'label'=> Form::label('name', 'Nama sub kategori')])
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
