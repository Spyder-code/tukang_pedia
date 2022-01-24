@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create</h3>
                {!! Form::open(['route' => ['review.update', $review], 'method' => 'put']) !!}
                     @include('component.input',['input'=> Form::number('transaction_id',$review->transaction_id,['class' => 'form-control']),'label'=> Form::label('transaction_id', 'transaction_id')])
                    @include('component.input',['input'=> Form::number('star',$review->star,['class' => 'form-control']),'label'=> Form::label('star', 'star')])
                    @include('component.input',['input'=> Form::textarea('comment',$review->comment,['class' => 'form-control']),'label'=> Form::label('comment', 'comment')])
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-primary mx-1 text-white" title="Update">Update</button>
 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection