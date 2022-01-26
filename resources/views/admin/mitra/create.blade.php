@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['mitra.store'], 'method' => 'post']) !!}
                    @include('component.input',['input'=> Form::number('user_id',null,['class' => 'form-control']),'label'=> Form::label('user_id', 'user_id')])
                    @include('component.input',['input'=> Form::text('name',null,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
                    @include('component.input',['input'=> Form::textarea('address',null,['class' => 'form-control']),'label'=> Form::label('address', 'address')])
                    @include('component.input',['input'=> Form::file('cv',null,['class' => 'form-control']),'label'=> Form::label('cv', 'cv')])
                    @include('component.input',['input'=> Form::file('avatar',null,['class' => 'form-control']),'label'=> Form::label('avatar', 'avatar')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection