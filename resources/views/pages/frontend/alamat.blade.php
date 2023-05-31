@extends('layout.frontend.app')

@section('content')
   <section class="main">
    <div class="content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3176980243934!2d110.8017479881308!3d-6.8524694330350115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c38bf4134d7b%3A0x61f42f48d6990941!2sCV.%20Jaya%20Setia%20Plastik!5e0!3m2!1sid!2sid!4v1678505226736!5m2!1sid!2sid"
                    style="border:0; width: 100%; height: 100vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="isi">
        <h1></h1>
    </div>
   </section>
@endsection
@push('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Assistant&family=Roboto+Slab&family=Ubuntu&display=swap');
        * {
        scroll-behavior: smooth;
        font-family: 'Assistant', sans-serif;
        }
        .content iframe{
            margin-top: -30px
        }
    </style>
@endpush
