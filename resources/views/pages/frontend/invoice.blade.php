@extends('layout.frontend.app')

@section('content')
    <div class="container content">
        <div class="row head">
            <div class="col-6">
                <h1>Jaya Setya Plastik</h1>
            </div>
            <div class="col-6 inv">
                <h3>INVOICE</h3>
                <p>{{ $pesanan[0]['pesanan']['kode_unik'] }}</p>
            </div>
        </div>
        <div class="row send">
            <div class="col-6">
                <div class="row">
                    <div class="col-3">
                        <p>Penjual</p>
                    </div>
                    :
                    <div class="col-3 penjual">
                        <p>
                            Jaya Setya Plastik
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <p class="untuk">Untuk</p>
                <div class="row">
                    <div class="col-3 nama">
                        <p>Pembeli</p>
                    </div>
                    :
                    <div class="col-6 pembeli">
                        <p>
                            {{ $pesanan[0]['user']['name'] }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 nama">
                        <p>Tanggal Pembelian</p>
                    </div>
                    :
                    <div class="col-5 pembeli">
                        <p>
                            {{ \Carbon\Carbon::parse($pesanan[0]['created_at'])->format('Y-m-d') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 nama">
                        <p>Alamat Pengiriman</p>
                    </div>
                    :
                    <div class="col-8 pembeli">
                        <p>
                            {{ $pesanan[0]['user']['alamat'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-produk">
            <hr style="height: 2px; color: black">
            <table class="table text-center">
                @php
                    $totalharga = 0;
                @endphp
                <thead>
                    <tr>
                        <th>INFO PRODUK</th>
                        <th>JUMLAH</th>
                        <th>HARGA SATUAN</th>
                        <th>TOTAL HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan[0]['paymentdetail'] as $item)
                    @php
                        $totalharga += $item['item']['price'] * $item['qty'];
                    @endphp
                    <tr>
                        <td>{{ $item['item']['name'] }} - {{ $item['item']['productlist']['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp. {{ number_format($item['item']['price']) }}</td>
                        <td>Rp. {{ number_format($item['item']['price'] * $item['qty']) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row total">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <div class="row  nama-barang">
                        <div class="col-6">
                            <p>TOTAL BARANG ( {{ count($pesanan[0]['paymentdetail']) }} BARANG)</p>
                        </div>
                        <div class="col-6 pembeli">
                            <p>
                              Rp.  {{ number_format($totalharga)}}
                            </p>
                        </div>
                    </div>
                    <div class="row ongkir">
                        <div class="col-6 ">
                            <p>Total Ongkos Kirim</p>
                        </div>
                        <div class="col-6 ">
                            <p>
                                Rp. {{ number_format($pesanan[0]['ongkir'])}}
                            </p>
                        </div>
                    </div>
                    <div class="row  nama-barang">
                        <div class="col-6">
                            <p>TOTAL BELANJA</p>
                        </div>
                        <div class="col-6 pembeli">
                            <p>
                               Rp. {{ number_format($totalharga + $pesanan[0]['ongkir']) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height: 2px; color: black">
            <div class="row footer">
                <div class="col-6">
                    <p>Kurir : <br>
                        {{ $pesanan[0]['kurir'] }}
                    </p>
                </div>
                <div class="col-6 inv">
                    <p>Metode Pembayaran :
                        <br>
                        Upload Bukti Transfer
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;400&family=Roboto+Slab&family=Ubuntu&display=swap');
        * {
            font-family: 'Assistant', sans-serif;
        }
        .content{
            margin-top: -80px;
            padding-top: 100px;
        }
        .content .head .inv{
            text-align: end;
        }
        .content .head h1{
            font-weight: bold;
        }
        .content .head h3{
            font-weight: bold;
        }
        .content .head p{
            font-weight: bold;
            color: #ff9900;
        }
        .content .send .penjual{
            font-weight: bold;
            font-size: 18px;
        }
        .content .send .untuk{
            font-weight: bold;
            font-size: 18px;
        }
        .content .send .pembeli{
            font-weight: bold;
            font-size: 18px;
        }
        .total .nama-barang{
            font-size: 19px;
            font-weight: bold;
        }
        .total .ongkir {
            font-size: 19px;
        }
        .footer {
            font-size: 19px;
            font-weight: bold;
        }
    </style>
@endpush
