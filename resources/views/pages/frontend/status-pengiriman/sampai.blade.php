@extends('layout.frontend.app')

@section('content')
<section class="content">
    <div class="data-isi">
        <div class="container">
            <h1>Status Pengiriman Anda</h1>
            <div class="isi">
                <div class="card card-menu">
                    <div class="card-body">
                        <div class="row menu-link" style="text-align: center">
                            <div class="col-3 bayar" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/konfirmasi/'. Auth::user()->id) }}">Bayar</a>
                            </div>
                            <div class="col-2 dikemas" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/dikemas/'. Auth::user()->id)}}">Dikemas</a>
                            </div>
                            <div class="col-2 dikirim" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/dikirim/'. Auth::user()->id)}}">Dikirim</a>
                            </div>
                            <div class="col-2 sampai" style="    border-right: 3px solid #fff;">
                                <a href="{{ url('status/sampai/'. Auth::user()->id)}}" class="active">Sampai</a>
                            </div>
                            <div class="col-3 batal">
                                <a href="{{ url('status/batal/'. Auth::user()->id)}}">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card result">
                        <div class="total">
                            <div class="row" style="text-align: center">
                                <div class="col-6">
                                    <h5>Total Transaksi Selesai</h5>
                                </div>
                                <div class="col-6">
                                    @if (!empty($hasil))
                                        <p class="pesan">{{ $hasil }} Pesanan</p>
                                    @else
                                        <p class="pesan">0 Pesanan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($payment)
                    @foreach ($payment as $item)
                    {{-- @if (\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i') < $now)

                    @else
                        @php
                            $total = $item->status;
                        @endphp --}}
                            @if ($item->status == 3)
                        <div class="card" style=" margin-top: 10px;">
                            <div class="card-body result">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="mb-3"><i class="fa-solid fa-user"></i> &nbsp; {{ $item->user->name }}</h5>
                                        <h5 class="mb-3"><i class="fa-solid fa-location-dot"></i> &nbsp; {{ $item->user->alamat }}</h5>
                                        <p class="tgl"><i class="fa-solid fa-calendar-days"></i> &nbsp; {{  \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}
                                        / {{  \Carbon\Carbon::parse($item->updated_at)->format('H:i a') }}
                                        </p>

                                        @if ($item->resi)
                                        <p ><i class="fa-solid fa-truck"></i> &nbsp; No. Resi :  {{ ($item->resi) }}</p>
                                        @endif
                                        <div class="detail d-flex">
                                            <a href="{{ url('status/detail-beli/'. $item->id) }}" class="mt-3" style="color: purple">Detail Produk Pembelian</a>
                                            <a href="{{ url('invoice/'. $item->id) }}" target="_blank" class="mt-3 mx-3" style="color: purple">Cetak Invoice</a>
                                        </div>
                                    </div>
                                    <div class="col-3" style="text-align: center">
                                        <h5 class="mb-3">Total Produk : {{ count($item['paymentdetail']) }}</h5>
                                        <p class="konfirm">
                                        <i class="fa-sharp fa-solid fa-tag fa-lg"></i> &nbsp; Rp.
                                        {{ number_format($item->price_total) }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @else
                        <div class="card" style="margin-top: 10px">
                            <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center; padding: 40px">
                                <p style="position: absolute; font-size: 25px; font-weight: 600">Belum Ada Transaksi</p>
                            </div>
                        </div> --}}
                        @endif
                    {{-- @endif --}}

                    @endforeach
                @else
                <div class="card" style="margin-top: 10px">
                    <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center">
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
        .data-isi h1 {
            padding: 100px;
            text-align: center;
            margin-bottom: -50px;
            font-weight: bold;
            font-size: 48px;
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
        .total .pesan {
            font-size: 18px;
            font-weight: 600;
        }
        .result .konfirm{
            font-size: 18px;
            font-style: italic;
            color:green;
        }
        .result .tgl {
            font-size: 18px;
            font-weight: 500;
        }
        @media screen and (max-width: 992px)
        {
            .data-isi h1 {
                padding: 129px;
                text-align: center;
                margin-bottom: -97px;
                font-weight: bold;
                font-size: 35px;
            }
            .isi .card-menu a {
                text-decoration: none;
                font-size: 16px;
                font-weight: 500;
                color: #ffff;
            }
            .isi .card-menu .menu-link a.active {
                text-decoration: none;
                font-size: 16px;
                font-weight: bold;
                color: #ffff;
            }
            .total h5{
                font-size: 1rem;
            }
            .total .pesan{
                font-size: 15px;
                font-weight: 600;
            }
            .mb-3 {
                margin-bottom: 1rem!important;
                font-size: 16px;
            }
            .result .konfirm{
                font-size: 15px;
                font-style: italic;
                color: green;
            }
            .result .tgl{
                font-size: 14px;
                font-weight: 500;
            }
            .result .detail a {
                font-size: 14px;
            }
        }
        @media screen and (max-width: 767px)
        {
            .data-isi h1 {
                padding: 113px;
                text-align: center;
                margin-bottom: -97px;
                font-weight: bold;
                font-size: 29px;
            }
            .isi .card-menu a {
                text-decoration: none;
                font-size: 14px;
                font-weight: 500;
                color: #ffff;
            }
            .isi .card-menu .menu-link a.active {
                text-decoration: none;
                font-size: 14px;
                font-weight: bold;
                color: #ffff;
            }
            .total h5 {
                font-size: 0.9rem;
            }
            .total .pesan {
                font-size: 14px;
                font-weight: 600;
            }
            .mb-3 {
                margin-bottom: 1rem!important;
                font-size: 14px;
            }
            .result .konfirm {
                font-size: 14px;
                font-style: italic;
                color: green;
            }
        }
        @media screen and (max-width: 535px)
        {
            .data-isi h1 {
                padding: 113px;
                text-align: center;
                margin-bottom: -97px;
                font-weight: bold;
                font-size: 25px;
            }
        }
        @media screen and (max-width: 498px)
        {
            .data-isi h1 {
                padding: 113px;
                text-align: center;
                margin-bottom: -97px;
                font-weight: bold;
                font-size: 19px;
            }
            .isi .card-menu a {
                text-decoration: none;
                font-size: 11px;
                font-weight: 500;
                color: #ffff;
            }
            .isi .card-menu .menu-link a.active {
                text-decoration: none;
                font-size: 11px;
                font-weight: bold;
                color: #ffff;
            }
        }
        @media screen and (max-width: 435px)
        {
            .data-isi h1 {
                padding: 93px;
                text-align: center;
                margin-bottom: -77px;
                font-weight: bold;
                font-size: 17px;
            }
            .bayar {
                border-right: 3px solid #fff;
                width: 19%;
            }
            .dikemas {
                border-right: 3px solid #fff;
                width: 22%;
            }
            .dikirim {
                border-right: 3px solid #fff;
                width: 20%;
            }
            .sampai {
                border-right: 3px solid #fff;
                width: 20%;
            }
            .batal {
                width: 16%;
            }
        }
    </style>
@endpush
