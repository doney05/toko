@extends('layout.backend.app')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-map-marker"></i>
        </span> Alamat Toko
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
                <h3>Alamat :</h3> <p>{{ $address->title }}</p>
                <a href="{{ url('admin/alamat/create/'. $address->id) }}">Ubah alamat</a>
            </div>
        </div>
    </div>
@endsection
