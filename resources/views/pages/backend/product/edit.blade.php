@extends('layout.backend.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
        </span> Edit Brand
    </h3>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif

<div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ url('admin/brand/update/'.$item->id) }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Upload Foto Banner</label>
                    <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" value="{{ $item->banner }}">
                    @error('banner')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Brand</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleInputName1" placeholder="Nama" required value="{{ $item->nama }}">
                    @error('nama')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
              </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                {{-- <button class="btn btn-light">Cancel</button> --}}
            </form>
            </div>
            <p>NB. Jika Anda edit data, harap isikan foto banner dan thumbnail</p>
        </div>
</div>
@endsection

@push('style')
    <style>
        p{
            color: rgb(182, 179, 179);
            padding-left: 3%
        }
    </style>
@endpush
