@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('product.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file">
                    <button type="submit">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
