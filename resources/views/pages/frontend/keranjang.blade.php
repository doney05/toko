@extends('layout.frontend.app')

@section('content')
 <section class="content">
     <div class="container isi">
         {{-- {{ dd($carts->where('users_id', Auth::user()->id))}} --}}
         <div class="mbuh">
             <form action="{{ url('proses-checkout/'. Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
                 @csrf
                 @method('POST')
                 <div class="title-atas mb-5">
                     <p>Keranjang Pembelian</p>
                 </div>
                 @if ($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
                 @endif
                 @if ($message = Session::get('error'))
                 <div class="alert alert-danger">
                     <p>{{ $message }}</p>
                 </div>
                 @endif
                 <div class="item">
                     <div class="pilih-semua">
                         <input type="checkbox" name="cek[]" class="head-cb" id="head-cb">
                         <p class="px-3">Pilih Semua</p>
                     </div>
                 </div>
                 <hr style="height: 4px; color: #BE4C00; margin-top: -5px;">
                 <div class="produk">
                     @php $total = 0; @endphp
                     @foreach ($carts as $cart)
                         @php $total += $cart->item->price * $cart->qty @endphp
                         {{-- <div class="pilih-semua">
                             <input type="checkbox" name="" id="head-cb">
                             <p class="px-3">{{ $cart->listitem->name }}</p>
                         </div> --}}
                         <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" class="users_id" id="users_id">
                         <div class="cart-semua " >
                             <div class="pilih-semua mb-3" data-id="{{ $cart->id}}">
                                 <div class="row d-flex align-items-center w-100" >
                                     <div class="col-3 col-sm-3 col-md-3 col-lg-3 d-flex" style="justify-content: space-evenly;">
                                         <input type="checkbox" name="status[]" class="child-cb" id="child-cb" value="{{ $cart->id  }}"
                                         price-id="{{ $cart->item->price * $cart->qty }}" weight-id="{{ $cart->item->weight * $cart->qty }}"
                                         qty-id="{{ $cart->qty }}">
                                         {{-- <input type="checkbox" name="weight[]" id="weight-cb" class="weight-cb" value="{{ $cart->item->weight * $cart->qty }}"> --}}
                                        <input type="hidden" name="id[]" value="{{ $cart->id  }}" class="price-product">
                                        <input type="hidden" name="weight[]" value="{{ $cart->item->weight * $cart->qty }}" class="weight-product">

                                        {{-- <input type="checkbox" name="status[]" class="child-cb" id="child-cb" value="{{ $cart->id  }}"
                                        price="{{ $cart->item->price * $cart->qty }}" hidden> --}}
                                        <input type="hidden" name="harga" value="{{ $cart->item->price * $cart->qty }}" id="harga-total" class="harga">
                                        <input type="hidden" class="cart_id" value="{{ $cart->id }}" id="cart_id">
                                        <img src="{{ Storage::url($cart->item->thumbnail) }}" alt="">
                                    </div>
                                 <div class="col-4 col-sm-4 col-md-4 col-lg-4 datprod">
                                     <div class="title d-flex">
                                         <p>{{ $cart->listitem->name }}
                                        &nbsp;&nbsp; - &nbsp;&nbsp; <span>{{ $cart->item->name }}</span></p>
                                     </div>
                                    <input type="hidden" name="price[]" value="{{ $cart->item->price * $cart->qty}}" class="price-product">
                                     <p  style="font-weight: bold; font-size: 0.7em">Rp. {{ number_format($cart->item->price)}}/{{ $cart->item->jenis }}</p>
                                     <input type="hidden" name="price-product" value="{{ $cart->item->price }}" class="price-product" id="price-product">

                                     <p style="font-weight: bold; font-size: 0.7em" id="berat-p"> Berat : {{ $cart->item->weight * $cart->qty }} (g)</p>
                                    <input type="hidden" name="weight" value="{{ $cart->item->weight }}" class="berat" id="berat">

                                 </div>
                                 <div class="col-5 col-sm-5 col-md-5 col-lg-5 head-quantity" data-item="{{ $cart->id}}">
                                    <div class="row d-flex align-items-baseline">
                                     <div class="col-4 col-sm-4 col-md-4 col-lg-7">

                                         <input type="hidden" class="id_product" value="{{ $cart->item->id }}" id="id_product">
                                         <div class="quantity " >
                                             <button class="plus-btn changeQuantity" type="button" name="button">
                                                 <i class="fa-solid fa-plus" style="color: #FF9900;"></i>
                                             </button>

                                            <input type="hidden" name="kuantiti[]" value="{{ $cart->qty }}" class="qty update" class="qty-product">
                                             <input type="text" name="qty" value="{{ $cart->qty }}" class="qty update" id="qty" style="background: none;">
                                             <button class="minus-btn changeQuantity" type="button" name="button">
                                                 <i class="fa-solid fa-minus" style="color: #FF9900"></i>
                                             </button>
                                         </div>
                                     </div>
                                     <div class="col-6 col-sm-6 col-md-6 col-lg-4 price">

                                         <p id="harga-p">Rp. {{ $cart->item->price * $cart->qty }}</p>
                                     </div>
                                     <div class="col-1 col-sm-1 col-md-1 col-lg-1 trash">
                                         {{-- <form action="{{ url('delete-keranjang/'. $cart->id)}}" method="POST">
                                         @csrf
                                         @method('DELETE') --}}
                                         <button type="submit" id="btn-checkout" class="delete_cart" style="background: none; border: none;">
                                             <i class="fa-solid fa-trash-can"></i>
                                         </button>
                                         {{-- </form> --}}
                                     </div>
                                    </div>
                                 </div>
                             </div>
                         </div>
                         <hr style="height: 4px; color: #BE4C00; margin-top: -5px;">
                     </div>

                     @endforeach
                 </div>
                 <div class="transaksi mt-5">
                     <div class="gambar">
                         <img src="{{ asset('frontend/assets/image/Path 4 New (1).png') }}" alt="" style="width: 100%">
                         <div class="check">
                             <h1>Ringkasan Belanja</h1>
                             <div class="row total mt-4">
                                 <div class="col-8 col-sm-8 col-md-8 col-lg-8 text-start d-flex">
                                     <p>Total Harga</p>
                                      <p class="px-2" id="selected">(0) Barang</p>
                                 </div>
                                 <div class="col-4 col-sm-4 col-md-4 col-lg-4 status text-end">
                                     <input type="hidden" name="total_harga" id="total_harga" value="0">
                                     <p id="price"> Rp. 0</p>
                                 </div>
                             </div>
                             <hr>
                             <div class="row total-harga">
                                 <div class="col-6 text-start">
                                     <p>Total Harga</p>
                                 </div>
                                 <div class="col-6">
                                     <p id="end-total"> Rp. 0</p>
                                 </div>
                             </div>
                         </div>
                         {{-- @foreach ($detail as $item)
                         @if ($item['carts_id'] == null)
                         <div class="btn-beli">
                             <button type="submit" id="btn-beli-all" onclick="alert('Produk sudah di checkout. Apakah ingin checkout lagi?')" style="background: none; border: none">
                                 <div class="gambar-btn">
                                     <img src="{{ asset('frontend/assets/image/Rectangle 11@2x.png') }}" alt="">
                                     <div class="data">
                                         <p id="beli">Beli (0)</p>
                                     </div>
                                 </div>
                             </button>
                         </div>
                         @else --}}
                         <div class="btn-beli">
                             <button type="submit" id="btn-beli-all" class="show_confirm" data-toggle="tooltip" disabled onclick="beli()" style="background: none; border: none">
                                 <div class="gambar-btn">
                                     <img src="{{ asset('frontend/assets/image/Rectangle 11@2x.png') }}" alt="">
                                     <div class="data">
                                         <p id="beli">Beli (0)</p>
                                     </div>
                                 </div>
                             </button>
                         </div>
                         {{-- @endif

                         @endforeach --}}
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </section>
@endsection
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
           @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@300;400&family=Roboto+Slab&family=Ubuntu&display=swap');
        * {
            font-family: 'Assistant', sans-serif;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: #FFDEB7;
        }
        .isi .mbuh {
            padding-top: 100px;
        }
        .isi .title-atas{
            font-size: 2em;
            font-weight: bold;
        }
        .isi .produk {
            height: 44vh;
            overflow-y: scroll;
            background: none;
        }
         .pilih-semua {
            display: flex;
            align-items: baseline;
            font-weight: bold;
            font-size: 19px;
        }
        .isi .item .pilih-semua p{
            text-align: center
        }
        .isi .quantity {
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .isi .produk img {
            width: 50%;
        }
        .isi .quantity {
        padding-top: 20px;
        margin-right: 60px;
        }
        .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
        }
        button[class*=btn] {
        width: 30px;
        height: 30px;
        background-color: #E1E8EE;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        }
        .minus-btn img {
        margin-bottom: 3px;
        }
        .plus-btn img {
        margin-top: 2px;
        }
        .check hr {
            height: 4px;
            color: rgb(117, 106, 106);
        }
        button:focus,
        input:focus {
        outline:0;
        }

        .gambar {
            position: relative;
            display: flex;
            justify-content: center;
        }
        .check {
            position: absolute;
            top: 5%;
            width: 30%;
        }
        .check h1{
            font-size: 1.8em;
            font-weight: bold;
            color: #000000;
            text-align: center
        }
        .check .total {
            margin-bottom: -15px;
        }
        .check .total p{
            color: #000000;
            font-size: 15px;
            font-weight: 600;
        }
        .check .total-harga p{
            color: #000000;
            font-size: 17px;
            font-weight: 600;
        }
        .btn-beli{
            position: absolute;
            top: 60%
        }
        .btn-beli img{
           width: 70%;
        }
        .btn-beli a{
            text-decoration: none;
        }
        .gambar-btn {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 4vh;
        }
        .btn-beli .data {
            text-align: center;

            position: absolute;
            top: 15%
        }
        .data p{
            color: white;
            font-size: 20px;
            font-weight: bold;

        }
        .mbuh {
            position: relative;
            justify-content: center;
        }
        .transaksi {
            margin-bottom: 70px;
        }
        .transaksi .gambar .total-harga #end-total {
            text-align: right;
        }
        @media screen and (max-width: 1200px) {
            .isi .produk {
                height: 44vh;
                overflow-y: scroll;
                background: none;
            }
            .check .total-harga p{
                color: #000000;
                font-size: 15px;
                font-weight: 600;
            }
            .btn-beli {
                position: absolute;
                top: 67%;
            }
            .data p {
                color: white;
                font-size: 17px;
                font-weight: bold;
            }
        }
        @media screen and (max-width: 992px) {
            .isi .produk {
                height: 40vh;
                overflow-y: scroll;
                background: none;
            }
            .isi .item {
                margin-top: -31px;
            }
            .pilih-semua {
                display: flex;
                align-items: baseline;
                font-weight: bold;
                font-size: 14px;
            }
            .isi .title-atas {
                font-size: 1.4em;
                font-weight: bold;
            }
            .check hr {
                height: 4px;
                color: rgb(117, 106, 106);
                margin-top: 4px;
                margin-bottom: 6px;
            }
            .head-quantity {
                width: 38%;
            }
            .isi .produk img {
                width: 55%;
            }
            .pilih-semua .quantity {
                display: inline-flex;
            }
            .quantity button[class*=btn] {
                width: 22px;
                height: 22px;
                background-color: #E1E8EE;
                border-radius: 6px;
                border: none;
                cursor: pointer;
            }
            .quantity input {
                -webkit-appearance: none;
                border: none;
                text-align: center;
                width: 32px;
                font-size: 13px;
                color: #43484D;
                font-weight: 300;
            }
            .quantity .changeQuantity i {
                color: #FF9900;
                font-size: 11px;
            }
            /* Ringkasan */
            .check {
                position: absolute;
                top: 5%;
                width: 35%;
            }
            .check h1 {
                font-size: 1.4em;
                font-weight: bold;
                color: #000000;
                text-align: center;
            }
            .check .total p {
                color: #000000;
                font-size: 12px;
                font-weight: 600;
            }
            .btn-beli {
                position: absolute;
                top: 71%;
            }
            .btn-beli .data {
                text-align: center;
                position: absolute;
                top: 20%;
            }
            .data p {
                color: white;
                font-size: 14px;
                font-weight: bold;
            }
        }
        @media screen and (max-width: 767px) {
        .isi .produk img {
            width: 67%;
        }
        .isi .title-atas {
            font-size: 1.2em;
            font-weight: bold;
        }
        .pilih-semua .title{
            font-size: 0.8em;
            font-weight: bold;
        }
        .quantity button[class*=btn] {
            width: 18px;
            height: 18px;
            background-color: #E1E8EE;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
        .head-quantity .price p {
            font-size: 12px;
            text-align: end;
        }
        .head-quantity .trash {
            width: 16%;
        }
           /* Ringkasan */
         .transaksi .gambar img {
            width: 100%;
            height: 100px;
        }
        .check {
            position: absolute;
            top: 5%;
            left: 4%;
            width: 48%;
        }
        .check hr {
            height: 4px;
            color: rgb(0 0 0);
            margin-top: -47px;
            margin-bottom: 8px;
            background: black;
        }
        .check h1 {
            font-size: 1.2em;
            font-weight: bold;
            color: #000000;
            text-align: left;
        }
        .check .total-harga {
            margin-bottom: -15px;
            display: none;
        }
        .check .total p {
            color: #000000;
            font-size: 13px;
            font-weight: 600;
        }
        .check hr {
            height: 4px;
            color: rgb(0 0 0);
            margin-top: -47px;
            margin-bottom: 8px;
            background: black;
        }
        .btn-beli {
            position: absolute;
            top: 25%;
            width: 34%;
            right: 0%;
        }
        .gambar-btn {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 4vh;
        }
        .btn-beli .gambar-btn img {
            height: 36px;
            border-radius: 30px;
            width: 60%;
        }
        .transaksi .gambar .total #price {
            text-align: left;
        }
        }
        @media screen and (max-width: 576px) {
        .pilih-semua {
            display: flex;
            align-items: baseline;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 7px;
        }
        .cart-semua .pilih-semua .datprod{
            margin-left: -37px;
        }
        .pilih-semua .title {
            font-size: 0.8em;
            font-weight: bold;
        }
        p {
            margin-top: 0;
            margin-bottom: 6px;
        }
        .quantity input {
            -webkit-appearance: none;
            border: none;
            text-align: center;
            width: 17px;
            font-size: 11px;
            color: #43484D;
            font-weight: 300;
        }
        .head-quantity .price p {
            font-size: 11px;
            text-align: end;
        }
        .isi .produk img {
            width: 67%;
            display: none;
        }
            /* Ringkasan */
        .btn-beli .gambar-btn img {
            height: 30px;
            border-radius: 30px;
            width: 50%;
        }
        .data p {
            color: white;
            font-size: 13px;
            font-weight: bold;
        }
        .check h1 {
            font-size: 1em;
            font-weight: bold;
            color: #000000;
            text-align: left;
            margin-top: 10px;
        }
        .check .total p {
            color: #000000;
            font-size: 11px;
            font-weight: 600;
        }
        .check hr {
            height: 4px;
            color: rgb(0 0 0);
            margin-top: -35px;
            margin-bottom: 8px;
            background: black;
        }
        }
        @media screen and (max-width: 504px) {
        .cart-semua .pilih-semua .datprod {
            margin-left: -37px;
            width: 44%;
        }
        .head-quantity {
            width: 34%;
        }
        }
        @media screen and (max-width: 490px) {
        .cart-semua .pilih-semua .datprod {
            margin-left: -37px;
            width: 42%;
        }
        .head-quantity {
            width: 40%;
        }
        .head-quantity .price p {
            font-size: 10px;
            text-align: end;
            /* padding-left: 3px; */
        }
        }
        @media screen and (max-width: 430px) {
            .isi .title-atas {
                font-size: 0.9em;
                font-weight: bold;
            }
            .pilih-semua {
                display: flex;
                align-items: baseline;
                font-weight: bold;
                font-size: 11px;
                margin-bottom: 7px;
            }
            .check h1 {
                font-size: 0.9em;
                font-weight: bold;
                color: #000000;
                text-align: left;
                margin-top: 10px;
            }
            .check .total p {
                color: #000000;
                font-size: 9px;
                font-weight: 600;
            }
            .btn-beli .gambar-btn img {
                height: 26px;
                border-radius: 30px;
                width: 50%;
            }
            .btn-beli .data {
                text-align: center;
                position: absolute;
                top: 25%;
            }
            .data p {
                color: white;
                font-size: 12px;
                font-weight: bold;
            }
        }
        @media screen and (max-width: 395px) {
            .head-quantity {
                width: 43%;
            }
        }
        @media screen and (max-width: 377px) {
            .head-quantity .price {
                margin-left: 7px;
            }
            .head-quantity .trash {
                width: 16%;
                margin-left: -12px;
            }
            .transaksi .gambar .total #price {
                text-align: left;
                margin-left: -17px;
            }
        }
        @media screen and (max-width: 355px) {
            .head-quantity {
                width: 45%;
                margin-left: -8px;
            }
            .head-quantity .price {
                margin-left: 10px;
            }
            .head-quantity .price p {
                font-size: 9px;
                text-align: end;
            }
            .check {
                position: absolute;
                top: 5%;
                left: 4%;
                width: 55%;
            }
            .quantity button[class*=btn] {
                width: 16px;
                height: 16px;
                background-color: #E1E8EE;
                border-radius: 6px;
                border: none;
                cursor: pointer;
            }
            .quantity input {
                -webkit-appearance: none;
                border: none;
                text-align: center;
                width: 17px;
                font-size: 10px;
                color: #43484D;
                font-weight: 300;
            }
            .data p {
                color: white;
                font-size: 10px;
                font-weight: bold;
            }
            .btn-beli .data {
                text-align: center;
                position: absolute;
                top: 30%;
            }
        }
        @media screen and (max-width: 330px) {
            .quantity button[class*=btn] {
                width: 15px;
                height: 15px;
                background-color: #E1E8EE;
                border-radius: 6px;
                border: none;
                cursor: pointer;
            }
            .quantity .changeQuantity i {
                color: #FF9900;
                font-size: 9px;
            }
            .quantity input {
                -webkit-appearance: none;
                border: none;
                text-align: center;
                width: 17px;
                font-size: 10px;
                color: #43484D;
                font-weight: 300;
            }
            .pilih-semua .title {
                font-size: 0.7em;
                font-weight: bold;
            }
            .head-quantity {
                width: 46%;
                margin-left: -7px;
            }
            .btn-beli .gambar-btn img {
                height: 21px;
                border-radius: 30px;
                width: 50%;
            }
            .btn-beli .data {
                text-align: center;
                position: absolute;
                top: 31%;
            }
            .data p {
                color: white;
                font-size: 9px;
                font-weight: bold;
            }
            .check {
                position: absolute;
                top: 5%;
                left: 4%;
                width: 58%;
            }
            .head-quantity .price p {
                font-size: 8px;
                text-align: end;
            }
            .head-quantity .price {
                margin-left: 8px;
            }
            @media screen and (max-width: 280px) {
                .isi .title-atas {
                    font-size: 0.8em;
                    font-weight: bold;
                }
                .cart-semua .pilih-semua .datprod {
                    margin-left: -32px;
                    width: 42%;
                }
                .head-quantity {
                    width: 49%;
                    margin-left: -12px;
                }
                .check {
                    position: absolute;
                    top: 5%;
                    left: 4%;
                    width: 63%;
                }
                .check h1 {
                    font-size: 0.8em;
                    font-weight: bold;
                    color: #000000;
                    text-align: left;
                    margin-top: 10px;
                }
            }
        }
    </style>
@endpush
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    $(document).ready(function () {
        $('.changeQuantity').click(function (e) {
        e.preventDefault();

            var input = document.querySelector('.qty');
            console.log(input);

        var quantity = $(this).closest(".head-quantity").find('.qty').val();
        var product_id = $(this).parents(".head-quantity").attr('data-item');

        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity':quantity,
            'product_id':product_id,
        };
        // console.log(data);

            $.ajax({
                url: '{{ url('update-cart') }}/'+product_id,
                type: 'POST',
                data: data,
                success: function (response) {
                    window.location.reload();
                    // alertify.set('notifier','position','top-right');
                    // alertify.success(response.status);
                }
            });
        });

    });

    // delete_cart
    $(document).ready(function () {
        $('.delete_cart').click(function (e) {
            e.preventDefault();

            var product_id = $(this).parents(".pilih-semua").attr('data-id');
            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };
            $(this).closest(".pilih-semua").remove();

            $.ajax({
                url: '{{ url('delete-keranjang')}}/'+product_id,
                type: 'DELETE',
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        });
    });

    // var checkboxes = document.querySelectorAll('#child-cb');
    // console.log(checkboxes);
    // var count=0;
    // document.getElementById('head-cb').onclick = function() {
    //     for(var checkbox of checkboxes) {
    //         checkbox.checked = this.checked;
    //         if (checkbox.checked == true) {
    //             count++;
    //             document.getElementById('selected').innerHTML=count();
    //         } else {
    //             count=0;
    //             document.getElementById('selected').innerHTML=count();
    //         }
    //     }
    // }

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


        $('.head-cb').on('click', function(){
            var isChecked = $('.head-cb').prop('checked');

            let er = $('.child-cb').prop('checked', isChecked);
            $('#btn-beli-all').prop('disabled', !isChecked);

            var number = $('.child-cb:checked').length;
            document.getElementById('selected').innerHTML=`(${number}) Barang`;

            var number = $('.child-cb:checked').length;
            document.getElementById('beli').innerHTML=`Beli (${number})`;

            let id_all = [];
            var total = 0;
            $.each(er, function(){
                id_all.push(+$(this).attr('price-id'));
            })
            // console.log(id_all);


            let sum = 0;
            for(let i = 0; i < id_all.length; i++) {
                sum += id_all[i];
            }
            if (sum) {
                console.log(sum);
                document.getElementById('price').innerHTML = `Rp. ${sum}`;
                $('#total_harga').val(sum);;
                document.getElementById('end-total').innerHTML = `Rp. ${sum}`;
                $('#total_harga').val(sum);;
            } else {
                document.getElementById('price').innerHTML = `Rp. 0`;
                $('#total_harga').val(sum);;
                document.getElementById('end-total').innerHTML = `Rp. 0`;
                $('#total_harga').val(sum);;
                console.log('kosong');
            }


        });


        $('.child-cb').on('click', function() {
            if ($(this).prop('checked')!=true) {
                $('.head-cb').prop('checked', false);
                $('.weight-cb').prop('checked', false);
                document.getElementById('selected').innerHTML=`(0) Barang`;
                document.getElementById('beli').innerHTML=`Beli (0)`;
            }


            let semua_checkbox = $('.child-cb:checked');
            let weight = $('.weight-cb').prop('checked', !semua_checkbox);
            // console.log(semua_checkbox) ;
            let button_checkout = (semua_checkbox.length>0);
            $('#btn-beli-all').prop('disabled', !button_checkout);
            var number = $('.child-cb:checked').length;
            document.getElementById('selected').innerHTML=`(${number}) Barang`;

            var number = $('.child-cb:checked').length;
            document.getElementById('beli').innerHTML=`Beli (${number})`;

            let checkbox = $('.child-cb:checked');
            let id = [];
            $.each(checkbox, function(index, elm) {
                id.push(+$(this).attr('weight-id'));
            })
            console.log(id);
            // var weight = $('.weight-product').val();
            // console.log(weight);



            let checkbox_pilih =  $('.child-cb:checked');
            let id_all = [];
            var total = 0;
            $.each(checkbox_pilih, function(){
                id_all.push(+$(this).attr('price-id'));
            })
            console.log(id_all);

            // var data =  {
            //         "weight" : id,
            //         "price" : id_all
            //     }
            // var user = document.getElementById("users_id").value;
            // // console.log(user);

            // $.ajax({
            //     url: '{{ url('proses-checkout')}}/'+user,
            //     type: 'POST',
            //     data: data,
            //     success: function (response) {
            //         console.log(response);
            //     }
            // });


            let sum = 0;
            for(let i = 0; i < id_all.length; i++) {
                sum += id_all[i];
            }
            document.getElementById('price').innerHTML = `Rp. ${sum}`;
            $('#total_harga').val(sum);;
            document.getElementById('end-total').innerHTML = `Rp. ${sum}`;
            $('#total_harga').val(sum);;

            // var id = $('#cart_id').val();
            // var harga = $('#harga-total');
            // var d = $('.child-cb').prop('checked')
            // var p = $(this).parents('.child-cb').attr('price');
            // let price_all = [];
            // $.each(d, function(index, price) {
            //     price_all.push(price.value)
            // })
            // var da = parseInt(id_all, 10)

            // var total = $('#total_harga').val();
            // if (id_all) {
            //         var sum = total*1+id_all*1;
            //         console.log(sum);
            //         document.getElementById('price').innerHTML = sum;
            //         $('#total_harga').val(sum);
            //     }else{
            //         var sum = total*1-id_all*1;
            //         console.log(sum);
            //         document.getElementById('price').innerHTML = sum;
            //         $('#total_harga').val(sum);
            //     }
            // var price = semua_checkbox.change('#total_harga').val();
            // console.log(price);

            // var count = $('.harga').val();
            // var d = $('.harga:checked');
            // console.log(d);
            // console.log(r);
            // semua_checkbox.each(function() {
            //     $(this).change(price);
            // });
            // price();
        })

        function beli()
        {
            console.log('cek');
        }
        $(function(){
            $('#qty, #price-product').keyup(function(){
               var value1 = parseFloat($('#qty').val()) || 0;
               var value2 = parseFloat($('#price-product').val()) || 0;
               var sum = value1 * value2;
               document.getElementById('harga-p').innerHTML=`Rp. ${sum}`;

               console.log(sum);
            });
            $('#qty, #berat').keyup(function(){
               var value1 = parseFloat($('#qty').val()) || 0;
               var value2 = parseFloat($('#berat').val()) || 0;
               var sum = value1 * value2;
               document.getElementById('berat-p').innerHTML=`Berat : ${sum} (g)`;

               console.log(sum);
            });
         });

         $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          event.preventDefault();
          Swal.fire({
                icon: 'info',
                title: 'Anda yakin untuk checkout?',
                text: "Periksa barang terlebih dahulu sebelum checkout!",
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Checkout!',
                confirmButtonColor: '#3085d6',
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Checkout berhasil!', '', 'success');
                    form.submit();
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        });

        // function add(id){


            // let checkbox_pilih =  $('.child-cb:checked');
            // let id_all = [];
            // var total = 0;
            // $.each(checkbox_pilih, function(index, elm){
            //     id_all.push(elm.value);
            // })
            // if (checkbox_pilih) {
            //     var quantity = parseInt( $(this).find('[name="harga"]').val());
            //     var price = parseInt( $(this).find('[name="harga"]').val());
            //      total =  quantity + price;
            //     console.log(total);
            // }

            // $.ajax({
            //     url: '{{ url('update-price')}}',
            //     type: 'post',
            //     data: {id:id_all},
            //     success: function (response) {
            //         window.location.reload();
            //     }
            // });

            // console.log(id_all);
        //     var id = $('#cart_id'+id).val();
        //     var harga = $('#harga-total'+id).val();
        //     var total = $('#total_harga').val();
        //     if ($('.child-cb').prop('checked') == true) {
        //             var sum = total*1+harga*1;
        //             console.log(sum);
        //             document.getElementById('price').innerHTML = sum;
        //             $('#total_harga').val(sum);
        //         }else if($('.child-cb').prop('checked') == false){
        //             var sum = total*1-harga*1;
        //             console.log(sum);
        //             document.getElementById('price').innerHTML = sum;
        //             $('#total_harga').val(sum);
        //         }
        // }

        // $(document).ready(function () {
        //     $('.child-cb').click(function(e) {
        //         e.preventDefault();
        //         var id = $(this).closest('div').find('cart_id').val();
        //         console.log(id);
        //     var harga = $('#harga-total').val();
        //     var total_harga = $('#total_harga').val();
        //     semua_checkbox = $('.child-cb:checked');
        //     if (semua_checkbox) {
        //         var sum = total_harga*1+harga*1;
        //         // document.getElementById('#price').innerHTML = sum;
        //         // $('#total_harga').val(sum);
        //     }
        //     // $('.child-cb').on('click', function() {
        //     //     if ($(this).prop('checked')!=true) {
        //             // $("#price").text(count);
        //             // $("#status").toggle(count > 0);
        //         // }
        //     // })
        // })
        // })

        // $('.child-cb :checkbox').change(price).change();
</script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        var classname = document.querySelectorAll('.changeQuantity');
        console.log(classname); --}}
        {{-- // Array.from(classname).forEach(function(element){
        //     element.addEventListener('change', function(){
        //         const id = element.getAttribute('data-item');
                // axios.path(`update-cart/${id}`,{
                //     quantity: this.value,
                //     id: id
                // });
                // .then(function(resp){
                //     window.location.href = 'keranjang/{id}'
                // })
                // .catch(function(err){
                //     console.log(err);
                // })
        //     })
        // }) --}}
    {{-- })
</script> --}}
@endpush
{{-- // $('.update').change(function (e){
    //     e.preventDefault();
    //     var ele = $(this);
        // console.log(data);
    //     $.ajax({
    //         url: '{{ route('update_cart')}}',
    //         method: 'patch',
    //         data: {
    //             _token: '{{ csrf_token() }}',
    //             id: ele.parents('div').attr('data-id'),
    //             qty: ele.parents('div').find('.qty').val()
    //         },
    //         success: function(resp){
    //             window.location.reload();
    //         }
    //     })
    // }) --}}
