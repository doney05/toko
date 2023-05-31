@extends('layout.backend.app')

@section('content')
    <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-window-restore"></i>
      </span> Riwayat Pembelian Batal
    </h3>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembeli</th>
                            <th>Tanggal</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga Beli</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payment as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}  / {{  \Carbon\Carbon::parse($item->updated_at)->format('H:i a') }}</td>
                            <td>{{ $hasil }} Produk</td>
                            <td>Rp. {{ number_format($item->price_total) }}</td>
                            <td>{{ $item->user->alamat }}</td>
                            <td>
                                <form action="{{ url('admin/riwayat/batal/delete/'. $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="mdi mdi-delete-forever"></i> Delete</button>
                                </form>
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
