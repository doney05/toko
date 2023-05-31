@extends('layout.backend.app')

@section('content')
    <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-crosshairs-gps"></i>
      </span> Akses Kompetitor
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('akses.create') }}">
                <span></span>Tambah Akses <i class="mdi mdi-database-plus icon-sm text-white align-middle"></i>
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
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akses as $item)
                            @if ($item->role == 0)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                {{ $item->name }}
                                <td>
                                {{ $item->username }}
                                </td>
                                <td>
                                    User
                                </td>
                                @if ($item->phone  == null)
                                    <td style="color: red">
                                        Belum ada nomor
                                    </td>
                                @else
                                    <td>
                                        {{ $item->phone }}
                                    </td>
                                @endif
                                @if ($item->alamat  == null)
                                    <td style="color: red">
                                        Alamat Kosong
                                    </td>
                                @else
                                    <td>
                                        {{ $item->alamat }}
                                    </td>
                                @endif
                                <td>
                                    <div class="buton d-flex">

                                    <a href="{{ url('admin/akses/edit/'.$item->id) }}">
                                        <i class="mdi mdi-lead-pencil"></i> Edit</a>

                                    <form action="{{ url('admin/akses/delete/'. $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            <i class="mdi mdi-delete-forever"></i> Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
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
