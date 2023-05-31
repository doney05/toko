@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Edit Produk {{ $produklist->name }}
      {{-- {{ dd($data)}} --}}
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ url('admin/product-item/'.$produklist->products_id.'/update/'.$item->product_lists_id.'/'.$item->id) }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <input type="hidden" name="product_lists_id">
                <div class="form-group">
                    <label>Upload Foto Thumbnail Produk</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"  name="thumbnail" value="{{ $item->thumbnail }}" required>
                    @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName1" placeholder="Nama" value="{{ $item->name }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Keterangan Produk</label>
                    <textarea class="form-control @error('description') is-invalid
                    @enderror" name="description" id="description" cols="30" rows="10">{{ $item->description }}</textarea>
                    {{-- <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName1" placeholder="Name" required> --}}
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Harga Produk</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputName1" placeholder="Harga" value="{{ $item->price }}" required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Stok Produk</label>
                    <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" id="exampleInputName1" placeholder="Stok" value="{{ $item->stock }}" required>
                    @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Isi Produk</label>
                    <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" id="exampleInputName1" placeholder="Isi" value="{{ $item->isi }}" required>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Berat Produk (g)</label>
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="exampleInputName1" placeholder="Berat (gram)" value="{{ $item->weight }}" required>
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
                        <option value="{{ $item->jenis }}">{{ $item->jenis}}</option>
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
                    <input type="number" class="form-control @error('qty') is-invalid @enderror" value="{{ $data->qty }}" name="qty" id="exampleInputName1" placeholder="Quantity">
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
            <p>NB. Jika Anda edit data, harap isikan foto banner dan thumbnail</p>
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
