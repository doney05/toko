@extends('layout.frontend.app')

@section('content')
    @php
        $itemProduct = $item->keyBy('id')->toArray();
        // $cartDetail = $cart->keyBy('qty')->toArray();
        // dd($itemProduct);

    @endphp
<section class="content">
    <div class="container">
        <h1 style="padding: 100px; text-align: center; margin-bottom: -50px; font-weight: bold; font-size: 48px;">Detail Pembelian Produk</h1>
        <div class="isi">
            <div class="card card-menu">
                <div class="card-body">
                    <div class="row menu-link" style="text-align: center">
                        <div class="col-3" style="    border-right: 3px solid #fff;">
                            <a href="{{ url('status/konfirmasi/'. Auth::user()->id) }}">Pembayaran</a>
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
                                    <p style="font-size: 18px;
                                    font-weight: 600;">{{ $detail }} Produk</p>
                                @else
                                    <p style="font-size: 18px;
                                    font-weight: 600;">0 Produk</p>
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
                                    <div class="col-3">

                                        <img src="{{ Storage::url($v['item']['thumbnail'])}}" alt="" style="width: 100%;  height: 18vh">
                                    </div>
                                    <div class="col-9 text-start">
                                        <h5>Nama Produk : {{ $v['item']['name'] }}</h5>
                                        {{-- {{ dd($itemProduct[$item]['paymentdetail']) }} --}}
                                            <h5>Quantity : {{ $v['qty']  }}</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
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
            {{-- @endif --}}
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
        }
        .content{
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
