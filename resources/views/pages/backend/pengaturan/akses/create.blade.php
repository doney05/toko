@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Tambah Akses
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ route('akses.store') }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label>Nama Kompetitor</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Nama" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="exampleInputusername1" placeholder="Username" required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">No. Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="No. Telepon" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>

                {{-- Alamat Tujuan --}}
                <div class="form-group">
                    <label for="province">Provinsi</label>
                   <select name="provinces_id" id="provinces_id" class="form-control">
                    <option value="" selected>Pilih Provinsi</option>
                    @foreach ($provinces as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="citi">Kota</label>
                   <select name="cities_id" id="cities_id" class="form-control">
                    <option>Pilih Kota</option>
                    {{-- @foreach ($cities as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach --}}
                   </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Alamat Lengkap Kompetitor</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  placeholder="alamat" required>
                    @error('alamat')
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
    <script>
        $(document).ready(function () {
            $('select[name="provinces_id"]').on('change', function () {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/admin/'+provinceId+'/cities',
                        method: 'GET',
                        datatype: 'JSON',
                        success: function(dat){
                            $('select[name="cities_id"]').empty();
                            $.each(dat, function(key, val){
                                $('select[name="cities_id"]').append('<option value="'+key+'">' + val + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="cities_id"]').empty();
                }
                console.log(provinceId);
            })
        })
    </script>
@endpush
