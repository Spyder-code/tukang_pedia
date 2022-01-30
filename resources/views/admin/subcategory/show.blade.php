@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::select('category_id',$subcategory->category_id,['class' => 'form-control']),'label'=> Form::label('category_id', 'category_id')])
                    @include('component.input',['input'=> Form::text('name',$subcategory->name,['class' => 'form-control']),'label'=> Form::label('name', 'name')])
               
            </div>
        </div>
    </div>
</div>
@endsection