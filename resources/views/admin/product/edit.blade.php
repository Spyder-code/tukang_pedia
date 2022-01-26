@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Edit {{ $product->title }}</h3>
                {!! Form::open(['route' => ['product.update',$product], 'method' => 'put', 'files' => true]) !!}
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::text('title',$product->title,['class' => 'form-control']),'label'=> Form::label('Judul', 'Judul')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('category_id',$category,$product->category_id,['class' => 'form-control']),'label'=> Form::label('Kategori', 'Kategori')])
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::select('regency_id',[ $product->regency_id => $product->regency->name],$product->regency_id,['class' => 'form-control', 'id' => 'regency']),'label'=> Form::label('Kabupaten', 'Kabupaten')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('district_id',[$product->district_id => $product->district->name ],$product->district_id,['class' => 'form-control', 'id' => 'district']),'label'=> Form::label('Kecamatan', 'Kecamatan')])
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::number('price',$product->price,['class' => 'form-control']),'label'=> Form::label('Harga', 'Harga per orang')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::number('stock',$product->stock,['class' => 'form-control']),'label'=> Form::label('stock', 'Jumlah orang yang tersedia')])
                    </div>
                </div>
                    @include('component.input',['input'=> Form::textarea('description',$product->description,['class' => 'form-control']),'label'=> Form::label('description', 'Deskripsi')])
                    @include('component.input',['input'=> Form::file('image',null,['class' => 'form-control']),'label'=> Form::label('image', 'image')])
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-plus"></i> Create</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(function(){
            $('#province').change(function (e) {
                var val = $(this).val();
                var url = {!! json_encode(url('api/regency')) !!}+'/'+val;
                axios.get(url)
                    .then(function (response) {
                        var data = response.data;
                        $('#regency').html('');
                        $.each(data, function (idx, item) {
                            var html = '<option value="'+item.id+'">'+item.name+'</option>';
                            $('#regency').append(html);
                        });
                    })
            });
            $('#regency').change(function (e) {
                var val = $(this).val();
                var url = {!! json_encode(url('api/district')) !!}+'/'+val;
                console.log(val);
                axios.get(url)
                    .then(function (response) {
                        console.log(response);
                        var data = response.data;
                        $('#district').html('');
                        $.each(data, function (idx, item) {
                            var html = '<option value="'+item.id+'">'+item.name+'</option>';
                            $('#district').append(html);
                        });
                    })
            });
        })
    </script>
@endsection
