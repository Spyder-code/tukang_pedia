@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Buat Layanan</h3>
                {!! Form::open(['route' => ['product.store'], 'method' => 'post', 'files' => true]) !!}
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::text('title',null,['class' => 'form-control']),'label'=> Form::label('Judul', 'Judul Layanan')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('category',$category,1,['class' => 'form-control', 'id'=>'category']),'label'=> Form::label('Kategori', 'Kategori')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('category_id',$sub_category,1,['class' => 'form-control', 'id' => 'sub']),'label'=> Form::label('Kategori', 'Sub Kategori')])
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::select('regency_id',$regency,null,['class' => 'form-control', 'id' => 'regency']),'label'=> Form::label('Kabupaten', 'Kabupaten')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('district_id',[''=>''],null,['class' => 'form-control', 'id' => 'district']),'label'=> Form::label('Kecamatan', 'Kecamatan')])
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::number('price',null,['class' => 'form-control']),'label'=> Form::label('Harga', 'Harga per orang')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::number('stock',null,['class' => 'form-control']),'label'=> Form::label('stock', 'Jumlah orang yang tersedia')])
                    </div>
                </div>
                    @include('component.input',['input'=> Form::textarea('description',null,['class' => 'form-control']),'label'=> Form::label('description', 'Deskripsi')])
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
            $('#category').change(function (e) {
                var val = $(this).val();
                var url = {!! json_encode(url('api/category')) !!}+'/'+val;
                axios.get(url)
                    .then(function (response) {
                        console.log(response);
                        var data = response.data;
                        $('#sub').html('');
                        $.each(data, function (idx, item) {
                            var html = '<option value="'+item.id+'">'+item.name+'</option>';
                            $('#district').append(html);
                        });
                    })
            });
        })
    </script>
@endsection
