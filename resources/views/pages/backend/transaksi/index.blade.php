@extends('layout.backend.app')

@section('content')
    <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-window-restore"></i>
      </span> Transaksi Belum Bayar
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
        {{-- <div class="card" style="height: 9vh;">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <a href="#">Belum Bayar</a>
                    </div>
                    <div class="col-2">
                        <a href="#">Dikemas</a>
                    </div>
                    <div class="col-2">
                        <a href="#">Dikirim</a>
                    </div>
                    <div class="col-2">
                        <a href="#">Selesai</a>
                    </div>
                    <div class="col-2">
                        <a href="#">Dibatalkan</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card total" style=" height: 7vh;">
            <div class="card-body">
               <div class="total">
                    <div class="row" style="margin-top: -10px">
                        <div class="col-6">
                            <h5>Total Belum Dibayar</h5>
                        </div>
                        <div class="col-6 text-end">
                            @if (!empty($hasil))
                                <p style="font-size: 18px;
                                font-weight: 500;">{{ $hasil }} Pesanan</p>
                            @else
                                <p style="font-size: 18px;
                                font-weight: 500;">0 Pesanan</p>
                            @endif
                        </div>
                    </div>
               </div>
            </div>
        </div>
        @if ($payment)
            @foreach ($payment as $item)
            @if ($item)
                @if ($item->status == 0)
                    <div class="card result" style=" margin-top: 10px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="mb-3"><i class="fa-solid fa-user"></i> &nbsp; {{ $item->user->name }}</h5>
                                    <h5 class="mb-3"><i class="fa-solid fa-location-dot"></i> &nbsp; {{ $item->user->alamat }}</h5>
                                    <p style="font-size: 18px;
                                    font-weight: 500;"><i class="fa-solid fa-calendar-days"></i> &nbsp; {{  \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}
                                       / {{  \Carbon\Carbon::parse($item->updated_at)->format('H:i a') }}
                                    </p>
                                    <div class="d-flex">
                                    <div class="detail">
                                            <a href="{{ url('admin/payment/belum-bayar/detail/'. $item->id) }}" class="mt-3" style="color: purple">Detail Pembayaran</a>
                                    </div>
                                    <div class="bukti mx-4">
                                            <a href="{{ url('admin/payment/belum-bayar/bukti/'. $item->id) }}" target="_blank" class="mt-3" style="color: purple">Lihat Bukti Pembayaran</a>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-3" style="text-align: center">
                                    <h5 class="mb-5">Total Produk : {{ count($item->paymentdetail) }}</h5>
                                <div class="tombol d-flex justify-content-center">
                                    <form action="{{ url('admin/payment/konfirmasi/update/'.$item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                                    </form>
                                    <form action="{{ url('admin/payment/batal/update/'.$item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger mx-3">Batalkan</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="card" style="margin-top: 10px">
                    <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center">
                        <p style="position: absolute; font-size: 25px; font-weight: 600">Belum Ada Transaksi</p>
                    </div>
                </div>
            @endif
            @endforeach
        @else
        <div class="card" style="margin-top: 10px">
            <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center">
                <p style="position: absolute; font-size: 25px; font-weight: 600">Tidak Ada Transaksi Masuk</p>
            </div>
        </div>
        @endif

        {{-- {{ dd($item) }} --}}

    </div>
@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        h3{
            font-weight: bolder;
        }
        nav ul .breadcrumb-item a{
            background-color: rgb(102, 9, 99);
            padding: 12px 16px;
            border-radius: 5px;
            color: rgb(197, 196, 196);
            text-decoration: none;
            font-weight: 600;
        }
        nav ul .breadcrumb-item a:hover{
            background-color: rgb(161, 1, 156);
            padding: 12px 16px;
            border-radius: 5px;
            color: rgb(255, 255, 255);
            text-decoration: none;
            font-weight: 600;
        }
        /* .card-body .row .col-2{
            text-align: center;
            padding-bottom: 1%;
        }
        .card-body .row .col-2:hover{
            border-bottom: 1px solid rgb(194, 0, 194);
            text-align: center;
            padding-bottom: 1%;
        }
        .card-body .row a{
            text-decoration: none;
            font-size: 19px;
            color: black;
        }
        .card-body .row a:hover{
            text-decoration: none;
            font-size: 19px;
            color: rgb(194, 0, 194);
        }
        .card-body .row a:active{
            text-decoration: none;
            font-size: 19px;
            color: rgb(194, 0, 194);
        } */
        .card-body table{
            padding-top: 5px;
        }
        .card-body table thead tr th {
            font-weight: bold;
            font-size: 16px
        }
        .card-body table tbody tr td {
            font-size: 14px
        }
        .card-body table tbody tr td a {
            text-decoration: none;
        }
        .card-body table tbody tr td a:hover {
            text-decoration: none;
            color: blue;
        }
        .card-body table tbody tr td button {
            border: none;
            background: none;
            color: #0d6efd;
        }
        .card-body table tbody tr td button:hover {
            text-decoration: none;
            color: blue;
        }
    </style>
@endpush
