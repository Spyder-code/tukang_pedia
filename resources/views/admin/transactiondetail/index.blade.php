@extends('layouts.admin')
@section('page','TransactionDetail Management')
@section('breadcrumb')
    <li><a href="#" class="fw-normal">TransactionDetail Management</a></li>
@endsection

@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total TransactionDetail</h3>
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
                    <h3 class="box-title mb-0">List TransactionDetail</h3>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap data-table table-bordered">
                        <thead>
                            <tr>
                                <th class="border">#</th>
                                <th class="border">Kode</th>
                                <th class="border">Total</th>
                                @if (!$is_confirm)
                                    <th class="border">Alamat Pemesanan</th>
                                    <th class="border">Tanggal Pesanan</th>
                                    <th class="border">Tanggal Kedatangan</th>
                                @endif
                                <th class="border">Status</th>
                                <th class="border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="txt-oflo">{{ $item->code }}</td>
                                <td class="txt-oflo">{{ $item->total }}</td>
                                @if (!$is_confirm)
                                    <td class="txt-oflo">{{ $item->address }}</td>
                                    <td class="txt-oflo">{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                    <td class="txt-oflo">{{ date('d F Y', strtotime($item->arrive)) }}</td>
                                @endif
                                <td class="txt-oflo">{{ $item->status==0?'Belum bayar':($item->status==1?'Menunggu Konfirmasi':'Terkonfirmasi') }}</td>
                                <td class="d-flex">
                                    <a target="d_blank" href="{{ route('page.transaction.detail',$item)  }}" class="btn btn-warning mx-1" title="View"><i class="fas fa-eye"></i></a>
                                    @if ($item->status==1 && Auth::id()==1)
                                        <a href="{{ route('transactiondetail.edit', $item) }}" class="btn btn-success text-white">Konfirmasi Pesanan</a>
                                    @endif
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
