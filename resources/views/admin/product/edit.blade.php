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
                        @include('component.input',['input'=> Form::text('title',$product->title,['class' => 'form-control']),'label'=> Form::label('Judul', 'Judul Layanan')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('category',$category,$product->category->category->id,['class' => 'form-control', 'id'=>'category']),'label'=> Form::label('Kategori', 'Kategori')])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::select('category_id',$sub,$product->category_id,['class' => 'form-control', 'id' => 'sub']),'label'=> Form::label('Kategori', 'Sub Kategori')])
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
                <div class="row mb-2">
                    <div class="col">
                        <label for="is_grouping">Tipe Layanan</label><br>
                        <div class="d-flex" style="gap: 30px">
                            <label for="is_grouping_1">
                                <input type="radio" name="is_grouping" id="is_grouping_1" value="0" {{ $product->is_grouping==0?'checked':'' }}>
                                Layanan Satuan
                            </label>
                            <label for="is_grouping_2">
                                <input type="radio" name="is_grouping" id="is_grouping_2" value="1" {{ $product->is_grouping==1?'checked':'' }}>
                                Layanan Borongan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @include('component.input',['input'=> Form::number('price',$product->price,['class' => 'form-control']),'label'=> Form::label('Harga', 'Harga per orang',['id'=>'harga-label'])])
                    </div>
                    <div class="col">
                        @include('component.input',['input'=> Form::number('stock',$product->stock,['class' => 'form-control']),'label'=> Form::label('stock', 'Jumlah orang yang tersedia',['id'=>'stock-label'])])
                    </div>
                </div>
                    @include('component.input',['input'=> Form::textarea('description',$product->description,['class' => 'form-control']),'label'=> Form::label('description', 'Deskripsi')])
                    @include('component.input',['input'=> Form::file('image',null,['class' => 'form-control']),'label'=> Form::label('image', 'image')])
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-success mx-1 text-white" title="Create"><i class="fas fa-save"></i> Update</button>
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

        $('input[type=radio][name=is_grouping]').change(function() {
            if (this.value == 1) {
                $('#harga-label').html('Harga borongan');
                $('#stock-label').html('Jumlah Ketersediaan Layanan');
            }
            else {
                $('#harga-label').html('Harga per orang');
                $('#stock-label').html('Jumlah orang yang tersedia');
            }
        });
    </script>
@endsection
