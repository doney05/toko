@extends('layout.frontend.app')

@section('content')
<section class="content">
    <div class="data-isi">
        <div class="container">
            <h1 style="padding: 100px; text-align: center; margin-bottom: -50px; font-weight: bold; font-size: 48px;">Status Pengiriman Anda</h1>
            <div class="isi">
                <div class="card card-menu">
                    <div class="card-body">
                        <div class="row menu-link" style="text-align: center">
                            <div class="col-3" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/konfirmasi/'. Auth::user()->id) }}" class="active">Pembayaran</a>
                            </div>
                            <div class="col-2" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/dikemas/'. Auth::user()->id)}}">Dikemas</a>
                            </div>
                            <div class="col-2" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/dikirim/'. Auth::user()->id)}}">Dikirim</a>
                            </div>
                            <div class="col-2" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/sampai/'. Auth::user()->id)}}">Sampai</a>
                            </div>
                            <div class="col-3">
                                <a href="{{ url('status/batal/'. Auth::user()->id)}}">Dibatalkan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card result">
                        <div class="total">
                            <div class="row" style="text-align: center">
                                <div class="col-6">
                                    <h5>Total Belum Dibayar</h5>
                                </div>
                                <div class="col-6">
                                    @if (!empty($hasil))
                                        <p style="font-size: 18px;
                                        font-weight: 600;">{{ $hasil }} Pesanan</p>
                                    @else
                                        <p style="font-size: 18px;
                                        font-weight: 600;">0 Pesanan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($payment)
                    @foreach ($payment as $item)
                    {{-- @if ($item) --}}
                        @if ($item->status == 0)
                            <div class="card " style=" margin-top: 10px;">
                                <div class="card-body result">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="mb-3"><i class="fa-solid fa-user"></i> &nbsp; {{ $item->user->name }}</h5>
                                            <h5 class="mb-3"><i class="fa-solid fa-location-dot"></i> &nbsp; {{ $item->user->alamat }}</h5>
                                            <p style="font-size: 18px;
                                            font-weight: 500;"><i class="fa-solid fa-calendar-days"></i> &nbsp; {{  \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}
                                            / {{  \Carbon\Carbon::parse($item->updated_at)->format('H:i a') }}
                                            </p>
                                            <div class="detail">
                                                <a href="{{ url('status/detail-beli/'. $item->id) }}" class="mt-3" style="color: purple">Detail Pembayaran</a>
                                            </div>
                                        </div>
                                        <div class="col-3" style="text-align: center">
                                            <h5 class="mb-3">Total Produk : {{ count($item->paymentdetail) }}</h5>
                                            <p style="font-size: 18px; font-style: italic; color:red">Menunggu Konfirmasi...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                    {{-- @else
                        <div class="card" style="margin-top: 10px">
                            <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center; padding: 40px">
                                <p style="position: absolute; font-size: 25px; font-weight: 600">Belum Ada Transaksi</p>
                            </div>
                        </div> --}}
                    @endif
                    @endforeach
                @else
                <div class="card" style="margin-top: 10px">
                    <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center; ">
                        <p style="position: absolute; font-size: 25px; font-weight: 600">Tidak Ada Transaksi Masuk</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
@push('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Assistant&family=Roboto+Slab&family=Ubuntu&display=swap');
        * {
        scroll-behavior: smooth;
        font-family: 'Assistant', sans-serif;
        }
        body {
            background: #FFDEB7;
            height: 75em;
        }
        .data-isi{
            padding-bottom: 5%;
        }
        .isi .card-menu{
            box-shadow: 0px 2px #c5c5c5;
            background: #D65500;;
        }
        .isi .card .result{
            box-shadow: 0px 2px #c5c5c5;
            background: #FFD596;;
        }
        .isi .card-menu a{
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            color: #ffff;
        }
        .isi .card-menu a{
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            color: #ffff;
        }
        .isi .card-menu .menu-link a.active{
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #ffff;
        }
        /* .isi .card-menu a:active{
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            color: #010111;
            background: black
        } */
        .isi .card .total .row{
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: end;
        }
    </style>
@endpush
