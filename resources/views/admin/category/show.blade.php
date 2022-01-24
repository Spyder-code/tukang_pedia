@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::text('name',$category->name,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
                    @include('component.input',['input'=> Form::text('icon',$category->icon,['class' => 'form-control']),'label'=> Form::label('icon', 'icon')])
               
            </div>
        </div>
    </div>
</div>
@endsection