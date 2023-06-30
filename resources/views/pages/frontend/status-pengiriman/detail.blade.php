@extends('layout.frontend.app')

@section('content')
    @php
        $itemProduct = $item->keyBy('id')->toArray();
        // $cartDetail = $cart->keyBy('qty')->toArray();
        // dd($itemProduct);

    @endphp
<section class="content">
    <div class="data-isi">
        <div class="container">
            <h1>Detail Pembelian Produk</h1>
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
                                <a href="{{ url('status/sampai/'. Auth::user()->id)}}">Sampai</a>
                            </div>
                            <div class="col-3 batal">
                                <a href="{{ url('status/batal/'. Auth::user()->id)}}">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    // $hasil = explode(',', $find->product_items_id);
                    // $qty = explode(',', $find->qty);
                    // dd($qty);
                @endphp
                <div class="card mt-3">
                    <div class="card result">
                        <div class="total">
                            <div class="row" style="text-align: center">
                                <div class="col-6">
                                    <h5>Detail Pembelian</h5>
                                </div>
                                <div class="col-6">
                                    @if (!empty($detail))
                                        <p class="pesan">{{ $detail }} Produk</p>
                                    @else
                                        <p class="pesan">0 Produk</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if ($find->status == 0) --}}
                @foreach ($pesanan as $item)
                @foreach ($item['paymentdetail'] as $v)

                {{-- {{ dd($v) }} --}}
                    <div class="card" style=" margin-top: 10px;">
                        <div class="card-body result">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{ Storage::url($v['item']['thumbnail'])}}" alt="">
                                        </div>
                                        <div class="col-8 text-start">
                                            <h5>Nama Produk : {{ $v['item']['name'] }}</h5>
                                            {{-- {{ dd($itemProduct[$item]['paymentdetail']) }} --}}
                                                <h5>Quantity : {{ $v['qty']  }}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-3 d-flex align-items-center justify-content-end">
                                    <p>Harga Produk <br>
                                <span style="color: red"> Rp. {{ number_format($v['item']['price'] * $v['qty']) }}</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endforeach
                {{-- @endif --}}
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
            color:red;
        }
        .result .tgl {
            font-size: 18px;
            font-weight: 500;
        }
        .result img {
            width: 77%;
            height: 15vh;
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
                color: red;
            }
            .result .tgl{
                font-size: 14px;
                font-weight: 500;
            }
            .result .detail a {
                font-size: 14px;
            }
            .result img {
                width: 100%;
                height: 12vh;
            }
            .result h5 {
                font-size: 16px;
            }
            .result p{
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
                color: red;
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
            .result img {
                width: 100%;
                height: 10vh;
            }
            .result h5 {
                font-size: 15px;
            }
            .result p {
                font-size: 14px;
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
            .result img {
                width: 100%;
                height: 7vh;
            }
            .result h5 {
                font-size: 13px;
            }
            .result p{
                font-size: 11px;
                font-weight: 400;
                text-align: center;
            }
        }
    </style>
@endpush
