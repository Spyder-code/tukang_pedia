@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::number('user_id',$product->user_id,['class' => 'form-control']),'label'=> Form::label('user_id', 'user_id')])
                    @include('component.input',['input'=> Form::number('province_id',$product->province_id,['class' => 'form-control']),'label'=> Form::label('province_id', 'province_id')])
                    @include('component.input',['input'=> Form::number('regency_id',$product->regency_id,['class' => 'form-control']),'label'=> Form::label('regency_id', 'regency_id')])
                    @include('component.input',['input'=> Form::number('district_id',$product->district_id,['class' => 'form-control']),'label'=> Form::label('district_id', 'district_id')])
                    @include('component.input',['input'=> Form::text('title',$product->title,['class' => 'form-control']),'label'=> Form::label('title', 'title')])
                    @include('component.input',['input'=> Form::number('price',$product->price,['class' => 'form-control']),'label'=> Form::label('price', 'price')])
                    @include('component.input',['input'=> Form::number('stock',$product->stock,['class' => 'form-control']),'label'=> Form::label('stock', 'stock')])
                    @include('component.input',['input'=> Form::number('rating',$product->rating,['class' => 'form-control']),'label'=> Form::label('rating', 'rating')])
                    @include('component.input',['input'=> Form::textarea('description',$product->description,['class' => 'form-control']),'label'=> Form::label('description', 'description')])
                    @include('component.input',['input'=> Form::file('image',$product->image,['class' => 'form-control']),'label'=> Form::label('image', 'image')])
               
            </div>
        </div>
    </div>
</div>
@endsection