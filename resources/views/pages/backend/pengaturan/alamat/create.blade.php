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
          <form action="{{ url('admin/alamat/store/'. $address->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="province">Provinsi</label>
               <select name="provinces_id" id="provinces_id" class="form-control">
                <option value="{{ $address->province->id }}" selected>{{ $address->province->title }}</option>
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
                <label for="alamat">Alamat Lengkap</label>
                <textarea name="title" id="title" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Simpan</button>
            </div>
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
