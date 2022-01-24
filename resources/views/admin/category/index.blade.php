@extends('layouts.admin')
@section('page','Category Management')
@section('breadcrumb')
    <li><a href="#" class="fw-normal">Category Management</a></li>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Category</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success">{{ $data->count() }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="white-box analytics-info">
                <h3 class="box-title">Last Created on</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success">{{ $data->count()>0?date('d F Y', strtotime($data->sortByDesc('created_at')->first()->created_at)):'Empty' }}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex justify-content-between mb-3">
                    <h3 class="box-title mb-0">List Category</h3>
                    <a href="{{ route('category.create') }}" class="box-title mb-0 text-white btn btn-success">Create Category</a>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap data-table table-bordered">
                        <thead>
                            <tr>
                                <th class="border">#</th>
                                <th class="border">Name</th>
                                <th class="border">Icon</th>
                                <th class="border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="txt-oflo">{{ $item->name }}</td>
                                <td class="txt-oflo">{{ $item->icon }} <i class="fas fa-{{ $item->icon }}"></i></td>
                                <td class="d-flex">
                                    <a href="{{ route('category.edit',$item) }}" class="btn btn-primary mx-1" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('category.show',$item) }}" class="btn btn-warning mx-1" title="View"><i class="fas fa-eye"></i></a>
                                    {!! Form::open(['route' => ['category.destroy', $item], 'method' => 'delete']) !!}
                                        <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger mx-1" title="Delete"><i class="fas fa-trash-alt text-white"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
