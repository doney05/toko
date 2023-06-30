{{-- @foreach ($produk->list as $item) --}}
    {{-- {{ dd($produk->list->productitem)}} --}}
{{-- @endforeach --}}
@extends('layout.frontend.app')

@section('content')
{{-- <div class="container header mb-3 style="background: #FF9900">
    <img src="{{ Storage::url($produkdetail->banner)}}" alt=""  style="width: 100%; padding-top: 10px; padding-bottom: 10px; margin-top: 100px">
</div> --}}
<section class="content-isi" >
    <div class="container" style=" margin-top: 1211px">
        <div class="container data-isi" style="margin-top: -1120px;
        margin-bottom: 40px; ">

        <div class="row">
               @foreach ($itemproduk as $item)
            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                <div class="card produk mt-3 mb-3" data-id="{{ $item->id }}">
                    <div class="card-body">
                        <div class="row  justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 img-col">
                                {{-- <div class="row gambar">
                                <div class="col-8 "> --}}
                                    <div class="xzoom-container images">
                                        <img src="{{ Storage::url($item->thumbnail) }}" alt="" class="x-zoom">
                                    </div>
                                {{-- </div>
                                </div> --}}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 isi d-flex justify-content-center align-items-center">
                                <div class="title">
                                    <input type="hidden" name="product" id="" value="{{ $item->productlist->id }}">
                                    <input type="hidden" name="item" id="" value="{{ $item->id }}">
                                    <input type="hidden" name="price" id="" value="{{ $item->price }}">
                                    <h2>{{ $item->productlist->name }} - {{$item->name}}</h2>
                                    <h6>Harga : {{ $item->price }}/{{ $item->jenis }}</h6>
                                    <h6>Stok : {{ $item->stock }}</h6>
                                    <h6>Berat : {{ $item->weight }}</h6>
                                    <hr>
                                    <p>
                                        {{ $item->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3" style="position: relative; display: flex; justify-content: center; align-items: center;">
                                <form action="{{ route('add_to_cart', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product" id="" value="{{ $item->productlist->id }}">
                                    <input type="hidden" name="item" id="" value="{{ $item->id }}">
                                    <input type="hidden" name="price" id="" value="{{ $item->price }}">
                                <div class="select">
                                    <div class="quantity">
                                        <button class="plus-btn changeQuantity" type="button" name="button">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input type="text" name="qty" value="1" class="qty update" id="qty-first" style="background: none">
                                        <button class="minus-btn changeQuantity" type="button" name="button">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        @auth
                                            @if ($cart->where('product_items_id', $item->id)->where('users_id', Auth::user()->id)->count())
                                                <p class="px-3 text-center">di Cart</p>
                                            @else
                                            <div class="btn-add">
                                                <button type="submit" class="btn-block"><i class="fa-sharp fa-solid fa-cart-plus fa-2xl"></i></button>
                                            </div>
                                            @endif
                                        @endauth
                                        @guest
                                            @if ($cart->where('product_items_id', $item->id)->where('users_id', '')->count())
                                            <p class="px-3 text-center">di Cart</p>
                                            @else
                                            <div class="btn-add">
                                                <a href="#" id="btn-cart" class="btn-block" style="margin-left: 20px"><i class="fa-sharp fa-solid fa-cart-plus fa-2xl"></i></a>
                                            </div>
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                                </form>
                                @if (Auth::check())
                                <div class="room">
                                    <div class="chat mx-3">
                                        <a href="{{ url('sendWa/'. $item->id ) }}"><i class="fa-solid fa-comment-dots fa-2xl" style="color: #e26c1d;"></i></a>
                                    </div>
                                    <form action="{{ url('checkout-beli/'. $item->id) }}" onclick="change()" method="POST">
                                        @csrf
                                        <div class="beli">
                                            <input type="hidden" name="qty_two" id="qty_beli" value="1">
                                            <input type="hidden" name="prod_id" id="prod_id" value="1">
                                            @if (empty(Auth::user()->id))

                                            @else
                                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                            @endif
                                            <button type="submit" onclick="change()" class="btn btn-primary" id="btn-beli">
                                                Beli Sekarang</button>
                                        </div>
                                    </form>
                                </div>
                                @else
                                {{-- <form action="#" onclick="change()" method="POST">
                                    @csrf --}}
                                    <div class="beli">
                                        <input type="hidden" name="qty_two" id="qty_beli" value="1">
                                        <input type="hidden" name="prod_id" id="prod_id" value="1">
                                        @if (empty(Auth::user()->id))

                                        @else
                                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        @endif
                                        <button type="submit" onclick="change()" class="btn btn-primary" id="btn-beli">
                                            Beli Sekarang</button>
                                    </div>
                                {{-- </form> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           </div>
        </div>
        <div class="pagination d-flex justify-content-between align-baseline" style="margin-bottom: 5%">
            <div class="pull-right">
                {{ $itemproduk->links() }}
            </div>
            <div class="showing" style="font-weight: bolder">
                Showing
                {{ $itemproduk->firstItem() }}
                to
                {{ $itemproduk->lastItem() }}
                of
                {{ $itemproduk->total() }}
                entries
            </div>
        </div>
    </div>
</section>
<section class="cart">
    <div class="container-flui pop">
    @auth
        @if ($cart->where('users_id', Auth::user()->id) )
        <a class="trigger_popup_fricc">
            <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #000000"></i> Cart <span class="badge rounded-pill bg-danger">{{ count($cart->where('users_id', Auth::user()->id)) }}</span>
        </a>
        <div class="hover_bkgr_fricc">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">&times;</div>

                    @php $total = 0 @endphp
                    @foreach($cart->where('users_id', Auth::user()->id) as $id => $details)
                        @php $total += $details->item->price * $details->qty @endphp
                    @endforeach

            <h1 class="keranjang text-end mt-3">Total : Rp. {{ number_format($total) }}</h1>
            <hr style="height: 4px; color: #000000; margin-bottom: 6%;">
                @if ($cart->where('users_id', Auth::user()->id)->count())
                <div class="shop">
                    <div class="container">
                        @if($cart->where('users_id', Auth::user()->id))
                        @foreach($cart->where('users_id', Auth::user()->id) as $id => $details)
                            <div class="row mb-2 d-flex w-100">
                                <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-5 col-xl-4 d-flex">
                                    <div class="gambar">
                                        <img src="{{ Storage::url($details->item->thumbnail)}}"
                                            class="rounded-3" alt="Cotton T-shirt">
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-7 col-xl-8 text-start">
                                    <div class="title d-flex" style="font-size: 1em; font-weight: bold;">
                                        <p>{{ $details->listitem->name}}
                                    &nbsp;&nbsp; - &nbsp;&nbsp;
                                    <span class="text-black mb-0">{{ $details->item->name }}</span></p>
                                    </div>
                                    <div class="row numb">
                                        <div class="col-6">Rp. {{ number_format($details->item->price) }}</div>
                                        <div class="col-6 text-end">Quantity : {{ $details->qty }}</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                            @endif
                    </div>
                </div>
                <hr style="height: 4px; color: #000000">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="{{ url('keranjang/'.Auth::user()->id)}}" class="btn btn-warning btn-block">Lihat Semua</a>
                    </div>
                </div>
                @else
                <div class="hover_bkgr_fricc">
                    <span class="helper"></span>
                    <div>
                        <div class="popupCloseButton">&times;</div>

                            @php $total = 0 @endphp
                            @foreach($cart as $id => $details)
                                @php $total += $details->item->price * $details->qty @endphp
                            @endforeach

                    <h1 class="keranjang text-end mt-3">Total : Rp. 0</h1>
                    <hr style="height: 4px; color: #000000; margin-bottom: 6%;">
                        <div class="shop">
                            <div class="container">
                                <p>Tidak ada Cart</p>
                            </div>
                        </div>
                        <hr style="height: 4px; color: #000000">
                    </div>
                </div>
                @endif

            </div>
        </div>
        @endif
    @endauth

    @guest
    <a class="trigger_popup_fricc">
        <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #000000"></i> Cart <span class="badge rounded-pill bg-danger">0</span>
        </a>
    <div class="hover_bkgr_fricc">
        <span class="helper"></span>
        <div>
            <div class="popupCloseButton">&times;</div>

                @php $total = 0 @endphp
                @foreach($cart as $id => $details)
                    @php $total += $details->item->price * $details->qty @endphp
                @endforeach

        <h1 class="keranjang text-end mt-3">Total : Rp. 0</h1>
        <hr style="height: 4px; color: #000000; margin-bottom: 6%;">
            <div class="shop">
                <div class="container">
                    <p>Tidak ada Cart</p>
                </div>
            </div>
            <hr style="height: 4px; color: #000000">
        </div>
    </div>
    @endguest


    </div>
</section>

@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('frontend/assets/xzoom/xzoom.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/xzoom/xzoom.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Kanit:ital@1&family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,300&family=Titan+One&family=Work+Sans:wght@700;800;900&family=Ysabeau+SC:wght@1&display=swap');
    * {
        font-family: 'Roboto', sans-serif;

    }
    /* .content-isi .title {
        text-align: justify;
    } */
    .content-isi {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        background: #FFC793;
        padding-bottom: 2%;
    }
    .content-isi::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        z-index: 0;
        opacity: 0.3;
        background: url('/frontend/assets/image/Design-Flat-Syaf-New12.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }
    .content-isi .produk {
        border-radius: 15px;
        box-shadow: 0px 2px 8px 1px;
    }
    .content-isi .produk .images img {
        width: 80%;
        height: 18vh;
    }
    .content-isi .produk .select {
        width: 100%;
    }
    .content-isi .produk .title {
        text-align: left;
        width: 100%;
    }
    .content-isi .produk .title h2{
        font-size: 19px;
        font-weight: bold;
    }
    .content-isi .produk .img-col{
    border-right: 1px solid #D9D9D9;
    }
    .content-isi .produk .title h6{
        font-size: 13px;
    }
    .content-isi .produk .title p{
        font-size: 13px;
    }
    .content-isi .image {
        position: relative;
        overflow-y: scroll;
        height: 50%;
    }
    .room .chat {
        font-size: 15px;
        /* margin-left: -15px; */
    }
    .pop{
        position: fixed;
        display: flex;
        justify-content: end;
        top: 93%;
        right: 2%;
    }
    /* #x-zoom{
        width: 400px;
        height: 400px;
    } */
    .content-isi .image img{
        padding-bottom: 5px
    }
    .content-isi .image::-webkit-scrollbar-track
    {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
    border-radius: 10px;
    }

    .content-isi .image::-webkit-scrollbar
    {
    width: 10px;
    background-color: #F5F5F5;
    }

    .content-isi .image::-webkit-scrollbar-thumb
    {
    border-radius: 10px;
    background-image: -webkit-gradient(linear,
                        left bottom,
                        left top,
                        color-stop(0.44, rgb(122,153,217)),
                        color-stop(0.72, rgb(73,125,189)),
                        color-stop(0.86, rgb(28,58,148)));
    }
    .content-isi .quantity {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content-isi .quantity {
        padding-top: 20px;
        margin-right: 60px;
    }
    .content-isi .quantity {
        position: absolute;
        top: 20%;
        left: 30%;
    }
    .content-isi .quantity p{
        width: 91px;
        font-size: 12px;
        margin-left: -12px;
        color: red;
    }
    .cart .shop img {
        width: 100%;
    }
    .cart .shop .numb {
        font-weight: bold;
        font-size: 0.8em
    }
    .cart .shop h1{
        font-size: 20px;
    }
    .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 14px;
        color: #43484D;
        font-weight: 300;
    }

    .select button[class*=btn] {
        width: 27px;
        height: 27px;
        /* background-color: #E1E8EE; */
        border-radius: 16px;
        border: none;
        cursor: pointer;
        background: none;
        border: 1px solid #e1e8ee;
    }
    .select .changeQuantity i {
        color: #FF9900;
        font-size: 13px;
    }
    .select .btn-add button {
        margin-left: 20px;
        background: none;
        border: none
    }
    .select .btn-add i {
        color: #FF9900;
        font-size: 24px;
    }
    .beli button {
        box-shadow: 0px 1px 3px 0px burlywood;
        border-color: #ffff;
        background: #FF9900;
        font-weight: bold;
        border-radius: 25px;
        font-size: 12px;
    }
    .minus-btn img {
    margin-bottom: 3px;
    }
    .plus-btn img {
    margin-top: 2px;
    }

    button:focus,
    input:focus {
    outline:0;
    }

    /* cart */
    .cart .trigger_popup_fricc{
        text-decoration: none;
        padding: 7px 20px;
        background: #FFC107;
        border-radius: 25px;
        color: #000000;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0px 4px 19px 4px #41464b;
    }
    /* Popup box BEGIN */
    .hover_bkgr_fricc{
        background:rgba(0,0,0,.4);
        cursor:pointer;
        display:none;
        height:100%;
        position:fixed;
        text-align:center;
        top:4.5%;
        left: 0;
        width:100%;
        z-index:10000;
    }
    .hover_bkgr_fricc .helper{
        display:inline-block;
        height:100%;
        vertical-align:middle;
    }
    .hover_bkgr_fricc > div {
        background-color: #e9e9e9;
        box-shadow: 10px 10px 60px #555;
        display: inline-block;
        height: auto;
        max-width: 530px;
        min-height: 100px;
        vertical-align: middle;
        width: 60%;
        position: relative;
        border-radius: 8px;
        padding: 15px 3%;
    }
    .hover_bkgr_fricc .keranjang {
        font-size: 1em;
        font-weight: bold;
    }
    .popupCloseButton {
        background-color: #fff;
        border: 3px solid #999;
        border-radius: 50px;
        cursor: pointer;
        display: inline-block;
        font-family: arial;
        font-weight: bold;
        position: absolute;
        top: -15px;
        right: -20px;
        font-size: 31px;
        line-height: 37px;
        width: 40px;
        height: 40px;
        text-align: center;
    }
    .popupCloseButton:hover {
        background-color: #ccc;
    }
    .hover_bkgr_fricc .checkout{
        display: flex;
        justify-content: center;
    }
    .checkout a{
        border-radius: 25px;
        font-weight: bold;
        box-shadow: 0px 1px 10px 0px rgb(153, 153, 153);
    }
    .hover_bkgr_fricc .shop {
        position: relative;
        overflow-y: scroll;
        margin-top: -3%;
        height: 30vh;
    }
    .hover_bkgr_fricc .shop::-webkit-scrollbar-track
    {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
    border-radius: 10px;
    }

    .hover_bkgr_fricc .shop::-webkit-scrollbar
    {
    width: 10px;
    /* background-color: #F5F5F5; */
    }

    .hover_bkgr_fricc .shop::-webkit-scrollbar-thumb
    {
    border-radius: 10px;
    background-image: -webkit-gradient(linear,
                        left bottom,
                        left top,
                        color-stop(0.44, rgb(122,153,217)),
                        color-stop(0.72, rgb(73,125,189)),
                        color-stop(0.86, rgb(28,58,148)));
    }

    .room {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: baseline;
    }
    .beli {
        margin-top: 50px;
    }
    @media screen and (min-width:1400px) {
        .header img {
            height: 40vh;
        }
    }

    @media screen and (max-width:1400px) {
        .header img {
            height: 38vh;
        }
    }
    @media screen and (max-width: 1200px){
        .cart .shop img {
            width: 70%;
        }
    }
    @media screen and (max-width:1100px) {
        .header img {
            height: 35vh;
        }
    }
    @media screen and (max-width: 992px) {
        .content .isi{
            margin-top: -100px;
        }
        .content-isi .produk {
            border-radius: 15px;
            box-shadow: 0px 2px 8px 1px;
            /* height: 48vh; */
        }
        .content-isi .quantity {
            position: absolute;
            top: -22%;
            left: 30%;
        }
        .content-isi .produk .images img {
            width: 50%;
            height: 15vh;
        }
        .content-isi .produk .title {
            text-align: center;
            width: 100%;
        }
        .produk .img-col .xzoom-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .h2, h2 {
            font-size: calc(8px + .9vw);
            font-weight: bold;
        }
        .h6, h6 {
            font-size: 13px;
        }
        .produk hr {
            height: 1px;
            margin-top: -3px;
            margin-bottom: 4px;
        }
        p {
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 12px;
        }
        .select .btn-add i{
            color: #FF9900;
            font-size: 25px;
        }
        .select button[class*=btn] {
            width: 24px;
            height: 24px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
         .select .btn-add button {
            margin-left: 20px;
            background: none;
            font-size: 12px;
        }
        .beli button{
            box-shadow:0px 1px 3px 0px burlywood;
            border-color: #ffff;
            background: #FF9900;
            font-weight: bold;
            border-radius: 25px;
            font-size: 13px;
        }
        .room .beli button{
            box-shadow:0px 1px 3px 0px burlywood;
            border-color: #ffff;
            background: #FF9900;
            font-weight: bold;
            border-radius: 25px;
            font-size: 12px;
        }
        .room .chat {
            font-size: 13px;
        }
        .room {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: baseline;
        }
        /* .content-isi .produk {
            border-radius: 15px;
            box-shadow: 0px 2px 8px 1px;
            height: 65vh;
        }
        .content-isi .quantity {
            position: absolute;
            top: -20%;
            left: 30%;
        }
        .produk .img-col{
            justify-content: center;
        }
        .produk .img-col img{
            width: 100%;
            height: 20vh;
        }
        .content-isi .produk .title {
            text-align: center;
            width: 100%;
        } */
        .keranjang .images
        .keranjang .title{
            margin-top: 20px;
            text-align: center;
        }
        .cart .shop img {
            width: 100%;
        }
    }
    @media screen and (max-width: 767px) {
        .content .gambar{
            margin-bottom: -175px;
        }
        .content-isi .produk {
            border-radius: 15px;
            box-shadow: 0px 2px 8px 1px;
            /* height: 45vh; */
        }
        .content-isi .quantity {
            position: absolute;
            top: -22%;
            left: 25%;
        }
        .content-isi .produk .images img {
            width: 68%;
            height: 12vh;
        }
        .produk .img-col .xzoom-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .h2, h2 {
            font-size: calc(8px + .9vw);
            font-weight: bold;
        }
        .h6, h6 {
            font-size: 12px;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 12px;
        }
        .select button[class*=btn] {
            width: 22px;
            height: 22px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
         .select .btn-add button {
            margin-left: 20px;
            background: none;
        }
        .beli {
            margin-top: 43px;
        }
        .beli button{
            box-shadow:0px 1px 3px 0px burlywood;
            border-color: #ffff;
            background: #FF9900;
            font-weight: bold;
            border-radius: 25px;
            font-size: 12px;
        }
        .room .beli button{
            box-shadow:0px 1px 3px 0px burlywood;
            border-color: #ffff;
            background: #FF9900;
            font-weight: bold;
            border-radius: 25px;
            font-size: 10px;
        }
        .room .chat {
            font-size: 12px;
        }
        .room {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: baseline;
        }
        .hover_bkgr_fricc > div {
            background-color: #fff;
            box-shadow: 10px 10px 60px #555;
            display: inline-block;
            height: auto;
            /* max-width: 551px; */
            min-height: 100px;
            vertical-align: middle;
            width: 75%;
            position: relative;
            border-radius: 8px;
            padding: 15px 5%;
        }

        /* .cart .shop img {
            width: 70%;
        } */
    }
    @media screen and (max-width: 594px) {
        .cart .shop h1 {
            font-size: 14px;
        }
        .cart .shop .title p{
            font-size: 13px;
        }
        .checkout a{
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0px 1px 10px 0px rgb(153, 153, 153);
            font-size: 12px;
        }
        .cart .trigger_popup_fricc {
            text-decoration: none;
            padding: 7px 14px;
            background: #FFC107;
            border-radius: 25px;
            font-size: 12px;
            color: #000000;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 4px 19px 4px #41464b;
        }
    }
    @media screen and (max-width: 576px) {
        .cart .shop img {
            display: none;
        }
        .content-isi .quantity {
            position: absolute;
            top: -22%;
            left: 38%;
        }
        .content-isi .produk .images img {
            width: 50%;
            height: 18vh;
        }
        .select .btn-add i {
            color: #FF9900;
            font-size: 22px;
        }
        .select button[class*=btn] {
            width: 20px;
            height: 20px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .select .changeQuantity i {
            color: #FF9900;
            font-size: 11px;
            position: absolute;
        }

    }
    @media screen and (max-width: 530px) {
        .content .gambar{
            margin-bottom: -160px;
        }
    }
   @media screen and (max-width: 455px) {
        .content .gambar{
            margin-bottom: -140px;
        }
        .content-isi .quantity {
            position: absolute;
            top: -22%;
            left: 35%;
        }
    }
    @media screen and (max-width: 444px) {
        .cart .shop .numb {
            font-size: 0.6em;
        }
    }
   @media screen and (max-width: 430px) {
        .content .gambar{
            margin-bottom: -100px;
        }
        .content-isi .quantity {
            position: absolute;
            top: -18%;
            left: 33%;
        }
    }
    @media screen and (max-width: 374px) {

    }
   @media screen and (max-width: 335px) {
        .content .gambar{
            margin-bottom: -70px;
        }
        .content-isi .produk {
            border-radius: 15px;
            box-shadow: 0px 2px 8px 1px;
            /* height: 42vh; */
        }
        .select button[class*=btn] {
            width: 18px;
            height: 18px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .select .changeQuantity i {
            color: #FF9900;
            position: absolute;
            font-size: 11px;
        }
        .content-isi .produk .images img {
            width: 47%;
            height: 12vh;
        }
    }

</style>
@endpush

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="{{ asset('frontend/assets/zoomsl/zoomsl.js') }}"></script>
<script src="{{ asset('frontend/assets/xzoom/xzoom.min.js') }}"></script>

<script type="text/javascript">
    $('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 0;
    		}

        $input.val(value);

    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =100;
    		}

    		$input.val(value);
    	});

        $(document).ready(function(){
            $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var input = document.querySelector('.qty');

            var quantity = $(this).closest(".quantity").find('.qty').val();
            var product_id = $(this).parents(".produk").attr('data-id');
            var user_id = document.getElementById("user_id").value;
            // console.log(quantity, user_id);
            var x = $('input[name=qty_two]').val(quantity);
            // var x = document.getElementById("qty_beli").value = quantity;
            var prod_id = document.getElementById("prod_id").value = product_id;
            // console.log(x, prod_id);
            });
        });

        $(window).load(function () {
            $(".trigger_popup_fricc").click(function(){
            $('.hover_bkgr_fricc').show();
            });
            // $('.hover_bkgr_fricc').click(function(){
            //     $('.hover_bkgr_fricc').hide();
            // });
            $('.popupCloseButton').click(function(){
                $('.hover_bkgr_fricc').hide();
            });
        });

</script>
<script>
    $(document).ready(function(){
      $("#btn-cart").click(function(){
        alert("Login Terlebih Dahulu.");
      });
    });

    function change()
        {
            var t = 56;
            var x = $('input[name=qty_two]').val();

        //    var x = document.getElementById("qty_beli").value = t;
            // var id = document.getElementById("prod_id").value;
            // var user_id = document.getElementById("user_id").value;
            // console.log(x);
            // var data = {
            //     '_token': $('input[name=_token]').val(),
            //     "id": id,
            //     'qty' : x,
            //     'user_id' : user_id
            // };

            // $.ajax({
            //     url: '{{ url('checkout-beli')}}/'+user_id,
            //     type: 'POST',
            //     data: data,
            //     success: function (response) {
            //         window.location.href="single-checkout/"+user_id;
            //         console.log(response);
            //     }
            // });
        }
</script>
{{-- <script>
     $(document).ready(function(){
        $(".xzoom, .xzoom-gallery").xzoom();

// $("#exzoom").exzoom({

// // thumbnail nav options
// "navWidth": 60,
// "navHeight": 60,
// "navItemNum": 5,
// "navItemMargin": 7,
// "navBorder": 1,

// // autoplay
// "autoPlay": true,

// // autoplay interval in milliseconds
// "autoPlayTimeout": 2000

// });

});

</script> --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.x-zoom').imagezoomsl({
            zoomrange: [3,2],
            zoomwidth: 100
        });
    });
</script>
@endpush
