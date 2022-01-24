@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['category.update', $category], 'method' => 'put']) !!}
                     @include('component.input',['input'=> Form::text('name',$category->name,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
                    @include('component.input',['input'=> Form::text('icon',$category->icon,['class' => 'form-control']),'label'=> Form::label('icon', 'icon')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-primary mx-1 text-white" title="Update">Update</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection