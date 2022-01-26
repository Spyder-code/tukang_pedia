@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::number('user_id',$mitra->user_id,['class' => 'form-control']),'label'=> Form::label('user_id', 'user_id')])
                    @include('component.input',['input'=> Form::text('name',$mitra->name,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
                    @include('component.input',['input'=> Form::textarea('address',$mitra->address,['class' => 'form-control']),'label'=> Form::label('address', 'address')])
                    @include('component.input',['input'=> Form::file('cv',$mitra->cv,['class' => 'form-control']),'label'=> Form::label('cv', 'cv')])
                    @include('component.input',['input'=> Form::file('avatar',$mitra->avatar,['class' => 'form-control']),'label'=> Form::label('avatar', 'avatar')])
               
            </div>
        </div>
    </div>
</div>
@endsection