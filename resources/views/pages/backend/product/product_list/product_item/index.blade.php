@extends('layout.backend.app')

@section('content')
    <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-crosshairs-gps"></i>
      </span> Produk {{ $listproduk->name }}
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ url('admin/product-item/'.$listproduk->products_id.'/create/'.$listproduk->id) }}">
                <span></span>Tambah Produk <i class="mdi mdi-database-plus icon-sm text-white align-middle"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" style="overflow-y: scroll">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Thumbnail Produk</th>
                            <th>Nama Produk</th>
                            <th>Keterangan</th>
                            <th>Harga Produk</th>
                            <th>Stok</th>
                            <th>Berat</th>
                            <th>Isi</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemproduk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- @php
                                $img = explode('|', $item->thumbnail)
                            @endphp --}}
                            <td>
                                <img src="{{ Storage::url($item->thumbnail)}}" width="230px" style="border-radius: unset" alt="">
                                {{-- <?php foreach ($img as $value) { ?>
                                <img src="{{ asset('public/backend/brand/produk/'.$value) }}" width="230px" style="border-radius: unset">
                                <?php }?> --}}
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>Rp. {{ number_format($item->price) }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->weight }} gram</td>
                            <td>{{ $item->isi }}</td>
                            <td>{{ $item->jenis }}</td>
                            {{-- <td>{{ $item->qty }}</td> --}}
                            <td>
                                <div class="buton d-flex">
                                <a href="{{ url('admin/product-item/'.$item->productlist->products_id.'/edit/'. $item->product_lists_id .'/' . $item->id) }}">
                                    <i class="mdi mdi-lead-pencil"></i> Edit</a>

                                <form action="{{ url('admin/product-item/'.$item->productlist->products_id.'/delete/'.  $item->product_lists_id .'/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        <i class="mdi mdi-delete-forever"></i> Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('style')
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
