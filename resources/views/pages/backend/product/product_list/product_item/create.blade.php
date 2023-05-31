@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Tambah Produk {{ $produk->nama }}
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ url('admin/product-item/'.$produk->products_id.'/store/'.$produk->id) }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <input type="hidden" name="products_id">
                <input type="hidden" name="product_lists_id">
                <div class="form-group">
                    <label>Upload Foto Thumbnail Produk</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" required>
                    @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName1" placeholder="Nama" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Keterangan Produk</label>
                    <textarea class="form-control @error('description') is-invalid
                    @enderror" name="description" id="description" cols="30" rows="10"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Harga Produk</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputName1" placeholder="Harga" required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Stok Produk</label>
                    <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" id="exampleInputName1" placeholder="Stok" required>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Isi Produk</label>
                    <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" id="exampleInputName1" placeholder="Isi" required>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Berat Produk (g)</label>
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="exampleInputName1" placeholder="Berat (gram)" required>
                    @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                     <p style="color: red">Berat produk harus berupa angka</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Jenis Produk</label>
                    <select name="jenis" id="jenis" class="form-control  @error('jenis') is-invalid @enderror">
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="pcs">Pcs</option>
                        <option value="karton">Karton</option>
                    </select>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputName1">Quantity Produk</label>
                    <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="exampleInputName1" placeholder="Quantity">
                    @error('qty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                     <p>NB. Quantity tidak harus diisi</p>
                </div> --}}

                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                {{-- <button class="btn btn-light">Cancel</button> --}}
            </form>
            </div>
        </div>
</div>
@endsection
