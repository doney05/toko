@extends('layout.backend.app')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-window-restore"></i>
        </span>Detail Transaksi
        </h3>
    {{-- <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('payment.create') }}">
                <span></span>Tambah Transaksi <i class="mdi mdi-database-plus icon-sm text-white align-middle"></i>
            </a>
            </li>
        </ul>
        </nav> --}}
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="container-fluid">
        <div class="card total" style=" height: 7vh;">
            <div class="card-body">
               <div class="total">
                    <div class="row" style="margin-top: -10px">
                        <div class="col-6">
                            <h5>Total Produk</h5>
                        </div>
                        <div class="col-6 text-end">
                           <p style="font-size: 18px;
                           font-weight: 500;">{{  $detail  }} Produk</p>
                        </div>
                    </div>
               </div>
            </div>
        </div>

        <div class="card total" style="margin-top: 10px">
            <div class="card-body">
               <div class="total">
                    <div class="row" style="margin-top: -10px">
                        <div class="col-6">
                            <h5>Bukti Pembayaran</h5>
                            <a href="{{ url('admin/payment/belum-bayar/bukti/'. $find->id) }}" target="_blank">Lihat Bukti Pembayaran</a>

                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="tombol d-flex justify-content-center">
                                <form action="{{ url('admin/payment/konfirmasi/update/'.$find->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                                </form>
                                <form action="{{ url('admin/payment/batal/update/'.$find->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger mx-3">Batalkan</button>
                                </form>
                               </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>

        @foreach ($pesanan as $item)
        @foreach ($item['paymentdetail'] as $v)
        {{-- {{ dd($item)}} --}}
            <div class="card result" style=" margin-top: 10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ Storage::url($v['item']['thumbnail'])}}" alt="" style="width: 100%">
                                </div>
                                <div class="col-6 text-start">
                                       <h5>Nama Produk : {{ $v['item']['name'] }}</h5>
                                        <h5>Quantity : {{ $v['qty']  }}</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <p style="font-size: 18px;
                            font-weight: 400; text-align: center">Harga Produk <br>
                            <span style="color: red"> Rp. {{ number_format($v['item']['price'] * $v['qty']) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endforeach
    </div>
@endsection
