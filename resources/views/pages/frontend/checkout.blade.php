@extends('layout.frontend.app')

@section('content')
{{-- @php
    $data = $cart->keyBy('id');
    // dd($data);
@endphp --}}
<section class="checkout" >
    <div class="container">
        <div class="data-isi">
            <div class="name">
                <div class="link d-flex">
                    <a href="{{ url('keranjang/'. Auth::user()->id) }}"><i class="fa-sharp fa-solid fa-arrow-left fa-2xl" style="color: #ff8800;"></i>
                    </a>
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="row detail">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="alamat">
                        <h4>Alamat Pengirim</h4>
                        <p>
                           {{ $addressDestination->alamat }}
                        </p>
                    </div>
                    <div class="row d-flex align-items-baseline">
                        <div class="col-6">
                            <div class="cari-alamat">
                                <button type="button" id="alamat" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $addressDestination->id }}">Pilih Alamat Lain <i class="fa-sharp fa-solid fa-location-dot"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $addressDestination->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ url('update/alamat/'. Auth::user()->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header text-center">
                                            <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Ubah Alamat</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="province">Provinsi</label>
                                                   <select name="provinces_id" id="provinces_id" class="form-control">
                                                    <option value="" selected>Pilih Provinsi</option>
                                                    @foreach ($provinces as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="citi">Kota</label>
                                                   <select name="cities_id" id="cities_id" class="form-control">
                                                    <option>Pilih Kota</option>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="province">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-simpan">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-6 pengiriman text-end">
                            <a href="#" class="btn-kirim" data-bs-toggle="modal" data-bs-target="#pengiriman{{ $destinasi }}" >Pengiriman <i class="fa-sharp fa-solid fa-truck-fast fa-lg"></i></a>

                             <!-- Modal -->
                            <div class="modal fade" id="pengiriman{{ $destinasi }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('cekOngkir/' . Auth::user()->id) }}" method="post">
                                        @csrf
                                        <div class="modal-header text-center">
                                        <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Pengiriman</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group text-start">
                                                <label for="pengiriman">Pilih Pengiriman</label>
                                                <select name="pengiriman" id="pengiriman" class="form-control mt-3">
                                                    <option value="" selected>-- Pilih --</option>
                                                    <option value="jne">JNE</option>
                                                    <option value="pos">POS Indonesia</option>
                                                    <option value="tiki">TIKI</option>
                                               </select>
                                            </div>
                                            <div class="form-group text-start mt-3">
                                                <label for="kurir">Pilih Layanan</label>
                                                <select name="kurir" id="kurir" class="form-control mt-3">
                                                    <option value="" selected>-- Pilih --</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-simpan">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="scrol">

                    @php $total = 0 @endphp
                    @foreach ($detail as $item)
                    @php $total += $item['cart']['item']['price'] * $item['cart']['qty'] @endphp

                        <hr style="height: 4px; color: #ff8800">
                            <div class="row produk">
                                <h3>{{ $item['cart']['listitem']['name']}}</h3>
                                <div class="col-12">
                                    <div class="images d-flex">
                                        <img src="{{ Storage::url(($item['cart']['item']['thumbnail'])) }}" alt="">
                                        <div class="row d-flex justify-content-center align-items-center w-100">
                                            <div class="col-8">
                                                <div class="title px-5">
                                                    <h5>{{ ($item['cart']['item']['name']) }}</h5>
                                                    <p> Rp. {{ number_format($item['cart']['item']['price'] * $item['cart']['qty'])}}</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <p>{{ $item['cart']['qty']}} {{ $item['cart']['item']['jenis'] }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        <hr style="height: 5px; color: #ff8800; margin-top: 15px">
                    </div>

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="gambar">
                        <img src="{{ asset('frontend/assets/image/Path3.png') }}" alt="" style="width: 100%">
                        <div class="belanja">
                            <h5>Belanja</h5>
                            <div class="row title-satu">
                                <div class="col-6">
                                    <p>Total Harga</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. {{ number_format($total)}}</p>
                                </div>
                            </div>
                            <div class="row title-satu">
                                <div class="col-6">
                                    <p>Total Ongkir</p>
                                </div>
                                <div class="col-6">
                                    <p>-</p>
                                </div>
                            </div>
                            <div class="row title-satu estimasi">
                                <div class="col-6">
                                    <p>Estimasi Tiba</p>
                                </div>
                                <div class="col-6">
                                    <p>-</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row total">
                                <div class="col-6">
                                    <p>Total Tagihan</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. {{ number_format($total)}}</p>
                                </div>
                            </div>
                            <div class="btn-bayar">
                                <a href="#" class="notif">Bayar Sekarang <i class="fa-sharp fa-solid fa-money-bill-wave"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
@push('style')
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;400&family=Roboto+Slab&family=Ubuntu&display=swap');
        * {
            font-family: 'Assistant', sans-serif;
        }
        body{
            background: #FFDEB7;
        }
        .name .link{
            justify-content: start;
            align-items: center;
            margin-top: -80px;
            padding-top: 100px;
        }
        .name a {
            text-decoration: none;
        }
        .name h1{
            padding-left: 14px;
            color: #FF9900;
        }
        .detail{
            height: 100vh;
        }
        .detail .alamat{
            margin-top: 20px;
        }
        .detail .alamat h4{
            font-weight: bolder;
        }
        .detail .alamat p{
            color: #707070;
            font-weight: 600;
            font-size: 18px;
        }
        .detail .cari-alamat {
            margin-top: 25px;
            margin-bottom: 15px;
        }
        .detail .cari-alamat #alamat{
            text-decoration: none;
            padding: 8px 14px;
            background-color: #FFF6EA;
            color: #A2A2A2;
            border: 2px solid #FF9900;
            border-radius: 15px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 1px 2px 1px 0px #A2A2A2;
        }
        .detail .cari-alamat #alamat:hover{
            background-color: #FF6600;
            color: #ffffff;
            border: 2px solid #FF9900;
        }
        .produk h3{
            font-size: 23px;
            color: #000000;
            font-weight: bolder;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .produk .images {
            border: 2px solid #ff8800;
            border-radius: 10px;
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .produk .images h5{
            font-weight: bolder;
        }
        .produk .images p{
            line-height: 1.5em;
        }
        .modal-footer button {
            background: #FF9901;
            border: none;
            color: white;
            font-weight: bold;
        }
        .modal-footer button:hover {
            background: #FF6600;
            color: white;
            font-weight: bold;
        }
         .pengiriman a{
            text-decoration: none;
            padding: 13px 50px;
            color: rgb(0, 0, 0);
            font-weight: bolder;
            background: #FF9901;
            border-radius: 15px;
            box-shadow: 1px 2px 1px 0px #A2A2A2;

        }
       .pengiriman a:hover{
            text-decoration: none;
            padding: 13px 50px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            background: #FF6600;
            border-radius: 15px;
        }
        .produk .pengiriman p{
            margin-top: 15px;
        }
        .gambar {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .belanja{
            position: absolute;
            top: 5%;
            left: 10%;
            width: 80%;
            height: 90%;
        }
        .gambar .belanja hr {
            height: 2px;
            color: white;
        }
        .belanja h5 {
            font-weight: bolder;
            font-size: 23px;
            color: rgb(0, 0, 0);
            margin-bottom: 15px;
        }
        .produk .images img {
            width: 25%;
            height: 18vh
        }
        .title-satu p{
            color: rgb(0, 0, 0);
            margin-bottom: 5px;
        }
        .total p{
            color: rgb(0, 0, 0);
            margin-bottom: 5px;
            font-size: 20px;
            font-weight: bolder;
        }
        .btn-bayar a{
            text-decoration: none;
            text-align: center;
            padding: 10px 80px;
            background: #FF6600;
            color: rgb(0, 0, 0);
            border-radius: 15px;
            font-weight: bolder;
            font-size: 20px;
            position: absolute;
            top: 90%;
            border: 3px solid black;
        }
        .btn-bayar a:hover{
            text-decoration: none;
            text-align: center;
            padding: 10px 80px;
            background: #bd4b00;
            color: rgb(0, 0, 0);
            border-radius: 15px;
            font-weight: bolder;
            font-size: 20px;
            position: absolute;
            top: 90%;
            border: 3px solid black;
        }
        .sub-total h3{
            font-weight: bold;
            font-size: 23px;
        }
        @media screen and (max-width: 1400px) {
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 10px 80px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 15px;
                position: absolute;
                top: 90%;
                border: 3px solid black;
            }
        }

        @media screen and (max-width: 1199px) {
            .total p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 18px;
                font-weight: bolder;
            }
            .detail .cari-alamat #alamat {
                text-decoration: none;
                padding: 8px 14px;
                background-color: #FFF6EA;
                color: #A2A2A2;
                border: 2px solid #FF9900;
                border-radius: 15px;
                font-size: 17px;
                font-weight: bold;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
            }
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 7px 55px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 15px;
                position: absolute;
                top: 90%;
                border: 3px solid black;
            }
        }
        @media screen and (max-width: 992px) {
            /* Previous */
            .checkout .data-isi .name .link a i {
                color: #ff8800;
                font-size: 22px;
            }
            .checkout .data-isi .name h1 {
                padding-left: 14px;
                color: #FF9900;
                font-size: 25px;
            }
            /* Address */
            .detail .alamat {
                margin-top: 20px;
                margin-bottom: -20px;
            }
            .detail .alamat h4 {
                font-weight: bolder;
                font-size: 17px;
            }
            .detail .alamat p {
                color: #707070;
                font-weight: 600;
                font-size: 12px;
            }
            .detail .cari-alamat #alamat {
                text-decoration: none;
                padding: 7px 15px;
                background-color: #FFF6EA;
                color: #A2A2A2;
                border: 2px solid #FF9900;
                border-radius: 15px;
                font-size: 12px;
                font-weight: bold;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
            }
            .pengiriman a {
                text-decoration: none;
                padding: 9px 30px;
                color: rgb(0, 0, 0);
                font-weight: bolder;
                background: #FF9901;
                border-radius: 15px;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
                font-size: 13px;
            }
            /* Product */
            .produk h3 {
                font-size: 15px;
                color: #000000;
                font-weight: bolder;
                margin-top: 10px;
                margin-bottom: 15px;
            }
            .produk .images img{
                width: 25%;
                height: 10vh;
            }
            .produk .images h5 {
                font-weight: bolder;
                font-size: 14px;
            }
            .produk .images p {
                line-height: 1.5em;
                font-size: 13px;
            }
            /* Shopping */
            .belanja h5 {
                font-weight: bolder;
                font-size: 17px;
                color: rgb(0, 0, 0);
                margin-bottom: 15px;
            }
            .title-satu p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 13px;
            }
            .total p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 13px;
                font-weight: bolder;
            }
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 3px 33px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 13px;
                position: absolute;
                top: 90%;
                border: 3px solid black;
            }
        }
        @media screen and (max-width: 767px) {
            .checkout .data-isi .name .link a i {
                color: #ff8800;
                font-size: 18px;
            }
            .checkout .data-isi .name h1 {
                padding-left: 14px;
                color: #FF9900;
                font-size: 22px;
            }
            .detail .cari-alamat {
                margin-top: 25px;
                margin-bottom: 5px;
            }
            .detail .alamat h4 {
                font-weight: bolder;
                font-size: 13px;
                margin-top: -14px;
            }
            .detail .alamat p {
                color: #707070;
                font-weight: 600;
                font-size: 10px;
                margin-top: -5px;
            }
            .detail .cari-alamat #alamat {
                text-decoration: none;
                padding: 5px 11px;
                background-color: #FFF6EA;
                color: #A2A2A2;
                border: 2px solid #FF9900;
                border-radius: 15px;
                font-size: 9px;
                font-weight: bold;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
            }
            .pengiriman a {
                text-decoration: none;
                padding: 7px 26px;
                color: rgb(0, 0, 0);
                font-weight: bolder;
                background: #FF9901;
                border-radius: 15px;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
                font-size: 9px;
            }
            .scrol {
                overflow-y: scroll;
                height: 34vh;
                overflow-x: hidden;
            }
            .produk {
                margin-top: -5px;
                margin-left: 2px;
            }
            .produk h3 {
                font-size: 11px;
                color: #2c1f1f;
                font-weight: bolder;
                margin-top: 10px;
                margin-bottom: 15px;
            }
            .produk .images img {
                width: 22%;
                height: 7vh;
                padding-top: 6px;
                padding-left: 5px;
            }
            .produk .images h5 {
                font-weight: bolder;
                font-size: 9px;
                padding-top: 6px;
            }
            .produk .images p {
                line-height: 1.5em;
                font-size: 9px;
            }
            .produk .col-12 {
                width: 98%;
            }
            .produk .images .title {
                width: 128%;
            }
            .gambar .belanja hr {
                height: 2px;
                color: white;
                margin-top: 6px;
                margin-bottom: 8px;
            }
            .belanja h5 {
                font-weight: bolder;
                font-size: 13px;
                color: rgb(0, 0, 0);
                margin-bottom: 15px;
            }
            .title-satu p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 9px;
            }
            .total p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 9px;
                font-weight: bolder;
            }
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 1px 18px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 11px;
                position: absolute;
                top: 90%;
                border: 1px solid black;
            }
        }
        @media screen and (max-width: 576px)
        {
            .detail {
                height: 0vh;
            }
            .detail .alamat h4 {
                font-weight: bolder;
                font-size: 15px;
                margin-top: -14px;
            }
            .detail .cari-alamat #alamat {
                text-decoration: none;
                padding: 5px 11px;
                background-color: #FFF6EA;
                color: #A2A2A2;
                border: 2px solid #FF9900;
                border-radius: 15px;
                font-size: 11px;
                font-weight: bold;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
            }
            .pengiriman a {
                text-decoration: none;
                padding: 7px 26px;
                color: rgb(0, 0, 0);
                font-weight: bolder;
                background: #FF9901;
                border-radius: 15px;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
                font-size: 11px;
            }
            .scrol {
                overflow-y: scroll;
                height: 44vh;
                overflow-x: hidden;
                margin-top: 7px;
            }
            .produk .images {
                border: 2px solid #ff8800;
                border-radius: 10px;
                display: flex;
                justify-content: start;
                align-items: center;
                height: 13vh;
            }
            .produk .images h5 {
                font-weight: bolder;
                font-size: 10px;
                padding-top: 6px;
            }
            .produk .images p {
                line-height: 1.5em;
                font-size: 10px;
            }
            .gambar {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 66px;
                margin-bottom: 15px;
            }
            .gambar img {
                width: 100%;
                height: 25vh;
                border-radius: 25px;
            }

            .belanja {
                position: absolute;
                top: 8%;
                left: 10%;
                width: 80%;
                height: 90%;
            }
            .belanja h5 {
                font-weight: bolder;
                font-size: 15px;
                color: rgb(0, 0, 0);
                margin-bottom: 15px;
            }
            .title-satu p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 11px;
            }
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 1px 18px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 13px;
                position: absolute;
                top: 79%;
                border: 1px solid black;
            }
        }
        @media screen and (max-width: 280px)
        {
            .produk {
                margin-top: -5px;
                margin-left: 0px;
            }
            .detail {
                height: 0vh;
            }
            .detail .cari-alamat #alamat {
                text-decoration: none;
                padding: 5px 11px;
                background-color: #FFF6EA;
                color: #A2A2A2;
                border: 2px solid #FF9900;
                border-radius: 15px;
                font-size: 10px;
                font-weight: bold;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
            }
            .pengiriman a {
                text-decoration: none;
                padding: 7px 25px;
                color: rgb(0, 0, 0);
                font-weight: bolder;
                background: #FF9901;
                border-radius: 15px;
                box-shadow: 1px 2px 1px 0px #A2A2A2;
                font-size: 10px;
            }
            .produk .images {
                border: 2px solid #ff8800;
                border-radius: 10px;
                display: flex;
                justify-content: start;
                align-items: center;
                height: 12vh;
            }
            .produk .images .title {
                width: 156%;
            }
            .scrol {
                overflow-y: scroll;
                height: 47vh;
                overflow-x: hidden;
            }
            .title-satu p {
                color: rgb(0, 0, 0);
                margin-bottom: 5px;
                font-size: 9px;
            }
            .gambar {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: -11px;
            }
            .gambar img {
                width: 100%;
                margin-top: 32px;
                height: 24vh;
            }
            .belanja {
                position: absolute;
                top: 23%;
                left: 10%;
                width: 80%;
                height: 67%;
            }
            .belanja h5 {
                font-weight: bolder;
                font-size: 15px;
                color: rgb(0, 0, 0);
                margin-bottom: 8px;
            }
            .belanja .estimasi {
                display: none;
            }
            .btn-bayar a {
                text-decoration: none;
                text-align: center;
                padding: 1px 18px;
                background: #FF6600;
                color: rgb(0, 0, 0);
                border-radius: 15px;
                font-weight: bolder;
                font-size: 11px;
                position: absolute;
                top: 85%;
                border: 1px solid black;
            }
            .modal-content {
                height: 53vh;
            }
            .modal-content h5 {
                font-size: 14px;
            }
            .modal-body {
                margin-top: -10px;
            }
            .modal-body label{
                font-size: 12px;
            }
            .modal-body .form-control {
                display: block;
                width: 100%;
                padding: 5px 0.75rem;
                font-size: 12px;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .modal-body textarea {
                height: 11vh;
            }
            .modal-footer button {
                font-size: 12px;
            }
            .pengiriman .modal-content {
                height: 45vh;
            }
        }
    </style>
@endpush
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('select[name="provinces_id"]').on('change', function () {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/getcity/'+provinceId+'/cities',
                    method: 'GET',
                    datatype: 'JSON',
                    success: function(dat){
                        $('select[name="cities_id"]').empty();
                        $.each(dat, function(key, val){
                            $('select[name="cities_id"]').append('<option value="'+key+'">' + val + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="cities_id"]').empty();
            }
            console.log(provinceId);
        })
        $('select[name="pengiriman"]').on('change', function () {
            let kirim = $(this).val();
            if (kirim) {
                jQuery.ajax({
                    url: '/getongkir/'+kirim,
                    method: 'GET',
                    datatype: 'JSON',
                    success: function(dat){
                        $('select[name="kurir"]').empty();
                        var ongkir = dat['rajaongkir']['results'][0]['costs'];
                        // console.log(ongkir);
                        $.each(ongkir, function(key, val){
                            // console.log(val);
                            $('select[name="kurir"]').append('<option value="'+ val['service'] +'">' +  val['service'] + ' ' + '(' + val['description'] + ')' + ' | ' + ' Est. '  + val['cost'][0]['etd'] + ' | ' + ' Rp.' + val['cost'][0]['value'] + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="kurir"]').empty();
            }

        })
    })


    $('.notif').click(function(event) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pilih pengiriman terlebih dahulu!',
            });
    });
</script>
@endpush
