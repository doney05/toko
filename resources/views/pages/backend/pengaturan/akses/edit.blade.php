@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Edit Akses
    </h3>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ route('akses.update', $item->id) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nama Kompetitor</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Nama" value="{{ $item->name }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="exampleInputusername1" placeholder="Username"
                     value="{{ $item->username }}" required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password"
                     value="{{ $item->password }}" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                     <p style="color: red">NB. Harap perbarui password</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">No. Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="No. Telepon"
                     value="{{ $item->phone }}">
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
                    <option value="{{ $item->province->id }}" selected>{{ $item->province->title }}</option>
                    @foreach ($provinces as $Prov)
                        <option value="{{ $Prov->id }}">{{ $Prov->title }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="citi">Kota</label>
                   <select name="cities_id" id="cities_id" class="form-control">
                    <option value="{{ $item->city->id }}">{{ $item->city->title}}</option>
                    {{-- @foreach ($cities as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach --}}
                   </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Alamat Lengkap Kompetitor</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  placeholder="Alamat"
                     value="{{ $item->alamat }}" required>
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
                            $('selec[name="cities_id"]').empty();
                            $.each(dat, function(key, val){
                                $('select[name="cities_id"]').append('<option value="'+key+'">' + val + '</option>');
                            });
                        },
                    });
                } else {
                    $('selec[name="cities_id"]').empty();
                }
                console.log(provinceId);
            })
        })
    </script>
@endpush
