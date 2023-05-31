@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Tambah Produk {{ $item->nama }}
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ route('product-list.store', $item->id) }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <input type="hidden" name="product_id">
                <div class="form-group">
                    <label for="exampleInputName1">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName1" placeholder="Nama" required>
                    @error('name')
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
@push('script')
    <script src="{{ asset('backend/assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        //  CKEDITOR.replace('description');
    </script>
@endpush
