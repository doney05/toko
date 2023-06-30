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
                    <a href="{{ URL::previous() }}"><i class="fa-sharp fa-solid fa-arrow-left fa-2xl" style="color: #ff8800;"></i>
                    </a>
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="row detail">
                <div class="col-8">
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
                                        <form action="{{ url('update/single-alamat/'. Auth::user()->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="prod_id" id="prod_id" value="{{ $itemproduk->id }}">
                                                <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
                                            <div class="modal-header text-center">
                                            <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Ubah Alamat</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="province">Provinsi</label>
                                                   <select name="provinces_id" id="provinces_id" class="form-control">
                                                    <option value="{{ $item->province->id }}"  selected>{{ $item->province->title }}</option>
                                                    @foreach ($provinces as $items)
                                                        <option value="{{ $items->id }}">{{ $items->title }}</option>
                                                    @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="citi">Kota</label>
                                                   <select name="cities_id" id="cities_id" class="form-control">
                                                    <option value="{{ $item->city->id }}" >{{ $item->city->title }}</option>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="province">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="" class="form-control" cols="30" rows="10">{{ $item->alamat }}</textarea>
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
                            @if (empty($ongkos))
                                <a href="#" class="btn-kirim" data-bs-toggle="modal" data-bs-target="#pengiriman{{ $destinasi }}" >Pengiriman <i class="fa-sharp fa-solid fa-truck-fast fa-lg"></i></a>
                            @else
                                <a href="#" class="btn-kirim" data-bs-toggle="modal" data-bs-target="#pengiriman{{ $destinasi }}" >{{ $kurir }} - {{ $kode_kurir }} <i class="fa-sharp fa-solid fa-truck-fast fa-lg"></i></a>
                            @endif

                             <!-- Modal -->
                            <div class="modal fade" id="pengiriman{{ $destinasi }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('singleCekongkir/' . $itemproduk->id) }}" method="post">
                                        @csrf
                                        <div class="modal-header text-center">
                                        <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Pengiriman</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group text-start">
                                                <label for="pengiriman">Pilih Pengiriman</label>
                                                <input type="hidden" name="prod_id" id="prod_id" value="{{ $itemproduk->id }}">
                                                <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
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

                        <hr style="height: 4px; color: #ff8800">
                        <div class="row produk">
                            <h3>{{ $itemproduk->productlist->name }}</h3>
                            <div class="col-12">
                                <div class="images d-flex">
                                    <img src="{{ Storage::url(($itemproduk->thumbnail)) }}" alt="" style="width: 25%; height: 18vh">
                                    <div class="row d-flex justify-content-center align-items-center w-100">
                                        <div class="col-8">
                                            <div class="title px-5">
                                                <h5>{{ ($itemproduk->name) }}</h5>
                                                <p> Rp. {{ number_format($total)}}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <p>{{ $qty }} {{ $itemproduk->jenis }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <hr style="height: 5px; color: #ff8800; margin-top: 15px">

                </div>
                <div class="col-4">
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
                            @if (empty($ongkos[0]['cost'][0]['value']))
                                <div class="row title-satu">
                                    <div class="col-6">
                                        <p>Total Ongkir</p>
                                    </div>
                                    <div class="col-6">
                                        <p>-</p>
                                    </div>
                                </div>
                            @else
                            <div class="row title-satu">
                                <div class="col-6">
                                    <p>Total Ongkir</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. {{ number_format($ongkos[0]['cost'][0]['value'])}}</p>
                                </div>
                            </div>
                            @endif
                            @if (empty($ongkos[0]['cost'][0]['etd']))
                                <div class="row title-satu">
                                    <div class="col-6">
                                        <p>Estimasi Tiba</p>
                                    </div>
                                    <div class="col-6">
                                        <p>-</p>
                                    </div>
                                </div>
                            @else
                            <div class="row title-satu">
                                <div class="col-6">
                                    <p>Estimasi Tiba</p>
                                </div>
                                <div class="col-6">
                                    <p>{{ $ongkos[0]['cost'][0]['etd'] }} Hari</p>
                                </div>
                            </div>
                            @endif
                            <hr style="height: 2px; color: white">
                            @if (empty($ongkos[0]['cost'][0]['value']))
                                <div class="row total">
                                    <div class="col-6">
                                        <p>Total Tagihan</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Rp. {{ number_format($total)}}</p>
                                    </div>
                                </div>
                            @else
                            <div class="row total">
                                <div class="col-6">
                                    <p>Total Tagihan</p>
                                </div>
                                <div class="col-6">
                                    <p>Rp. {{ number_format($total + $ongkos[0]['cost'][0]['value']) }}</p>
                                </div>
                            </div>
                            @endif
                            <div class="btn-bayar">
                                @if (empty($ongkos))
                                     <a href="#">Bayar Sekarang <i class="fa-sharp fa-solid fa-money-bill-wave"></i></a>

                                @else
                                     <a href="#" data-bs-toggle="modal" data-bs-target="#bayar">Bayar Sekarang <i class="fa-sharp fa-solid fa-money-bill-wave"></i></a>

                                     <!-- Modal Bayar-->
                                     <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ url('bukti-upload/'. $itemproduk->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="qty" id="qty" value="{{ $qty }}">
                                                <input type="hidden" name="kurir" value="{{ $kurir .' - '. $kode_kurir }}">
                                                <input type="hidden" name="ongkir" value="{{ $ongkos[0]['cost'][0]['value'] }}">
                                                <div class="modal-header text-center">
                                                <h4 class="modal-title fw-bold" id="exampleModalLongTitle">Selesaikan Pembayaran</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group text-start mt-3">
                                                        <h6 for="bank">Nomor Rekening</h6>
                                                        <p>
                                                            5926 15643 65464 (BRI a.n JSP) <br>
                                                            3396 64646 55636 (BCA a.n JSP)
                                                        </p>
                                                    </div>
                                                    <div class="form-group text-start mt-3">
                                                        <h6 for="bank">Harga yang dibayarkan</h6>
                                                        <input type="hidden" name="price_total" value="{{ $total + $ongkos[0]['cost'][0]['value'] }}">
                                                        <p>
                                                          Rp. {{ number_format($total + $ongkos[0]['cost'][0]['value']) }}
                                                         </p>
                                                    </div>
                                                    <div class="form-group text-start mt-3">
                                                        <h6 for="bank">Upload Bukti Transfer</h6>
                                                        <input type="file" name="image" class="form-control mt-1" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-simpan">Upload Bukti Transfer</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                @endif

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
        .checkout{
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
        .belanja h5 {
            font-weight: bolder;
            font-size: 23px;
            color: rgb(0, 0, 0);
            margin-bottom: 15px;
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
    </style>
@endpush
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            var prod_id = $('#prod_id').val();
            var qty = $('#qty').val();
            console.log(kirim, prod_id, qty);
            if (kirim, prod_id , qty) {
                jQuery.ajax({
                    url: '/singleongkir/'+kirim+'/'+prod_id+'/'+qty,
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
</script>
@endpush
