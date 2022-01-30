@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['subcategory.update', $subcategory], 'method' => 'put']) !!}
                    @include('component.input',['input'=> Form::select('category_id',$category,$subcategory->category_id,['class' => 'form-control']),'label'=> Form::label('category_id', 'Kategori')])
                    @include('component.input',['input'=> Form::text('name',$subcategory->name,['class' => 'form-control']),'label'=> Form::label('name', 'Nama sub kategori')])
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-primary mx-1 text-white" title="Update">Update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
