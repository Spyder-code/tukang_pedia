@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Detail </h3>                
                    @include('component.input',['input'=> Form::number('transaction_id',$review->transaction_id,['class' => 'form-control']),'label'=> Form::label('transaction_id', 'transaction_id')])
                    @include('component.input',['input'=> Form::number('star',$review->star,['class' => 'form-control']),'label'=> Form::label('star', 'star')])
                    @include('component.input',['input'=> Form::textarea('comment',$review->comment,['class' => 'form-control']),'label'=> Form::label('comment', 'comment')])
               
            </div>
        </div>
    </div>
</div>
@endsection