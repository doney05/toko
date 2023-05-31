@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Tambah Brand
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ route('brand.store') }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Upload Foto Banner</label>
                    <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner">
                    @error('banner')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Brand</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleInputnama1" placeholder="Nama" required>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                {{-- <button class="btn btn-light">Cancel</button> --}}
            </form>
            </div>
        </div>
</div>
@endsection
