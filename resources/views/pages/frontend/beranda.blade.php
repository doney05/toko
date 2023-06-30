@extends('layout.frontend.app')

@section('content')

<section class="baner" style="height: 50vh; padding-top: 6%;">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('frontend/assets/image/banner/header 1.png')}}" class="w-100" alt="Second Slide">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('frontend/assets/image/banner/Header 2.png')}}" class="w-100" alt="Third Slide">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
         </div>
    </div>
</section>
<section class="brand" style="margin-top: -40px">
    <div class="container">
        <div class="row">
            <div class="col-5" style="color: #D9D9D9">
                <hr>
            </div>
            <div class="col-2">
                <h3 class="text-center fw-bold">
                    Official Brand
                </h3>
            </div>
            <div class="col-5"  style="color: #D9D9D9">
                <hr>
            </div>
        </div>
    </div>
</section>
<section class="all-brand">
    <div class="container">
        <div class="row" style="width: 104%;">
            @foreach ($produk as $item)
            <a href="{{ url('produk/'. $item->id)}}" class="xzoom-container brand mx-2 my-3">
                <div class="col-2">
                    <img src="{{ Storage::url($item->banner) }}" alt="" class="x-zoom" style="width: 50%;">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<section class="garis">
    <div class="container mt-5 mb-5">
        <hr style="color: #D9D9D9">
    </div>
</section>
<section class="content mt-3">
    <div class="gambar" style="height: 50vh; background: #D9D9D9; margin-bottom: 50px">
        <div class="row" style="height: 47vh">
            <div class="col-6">
                <div class="title">
                    <h5>Temukan produk untuk kebutuhan Anda</h5>
                    <a href="#">Lihat Produk &nbsp; <i class="fa-solid fa-arrow-right-to-bracket mt-1"></i></a>
                </div>
                <div class="images">
                </div>
            </div>
            <div class="col-6">
                <div class="img">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="footer mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
               <div class="title mt-3">
                <div class="logo d-flex" style="font-weight: 900; color: cornflowerblue; justify-content: center; margin-bottom: -18px">
                    <h1 style="font-weight: 900">JSP</h1>
                    <p style="margin-top: 20px">Store</p>
                </div>
                <h2 style=" color: #006096; font-weight: bold;">Jaya Setya Plastik</h2>
               </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3">
                        <div class="head">
                            <h6 style="font-weight: bold">Head Office</h6>
                            <p style="font-size: 13px">Jalan Raya Demak-Kudus KM. 19 Karanganyar Demak Jawa Tengah Kode Pos. 59582</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <h6 style="font-weight: bold">Contact Us</h6>
                        <p style="font-size: 13px">Instagram <br>
                            Facebook <br>
                            WhatsApp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="header first-header">
    <div class="image-banner" style="    position: relative;
    display: flex;
    justify-content: end;">
        <img src="{{ asset('frontend/assets/image/Design-Flat-Syaf-New14.jpg')}}" class="w-100" alt="...">
        <div class="title" style="    position: absolute;
        top: 38%;
        text-align: center;
        right: 15%;">
            <h1 style=" font-size: 8em;
            font-weight: bold;
            font-family: cursive;
            color: #09095c;">Happy <br> <span style="    font-family: cursive;
    color: #fce1be;
    -webkit-text-stroke: 4px #09095c;">Shop</span></h1>
        </div>

      </div>
</section> --}}
{{-- <section class="header second-header" id="parallax">
    <div class="image">
        <img src="{{ asset('frontend/assets/image/Design-Flat-Syaf-New11.jpg') }}" alt="">
    </div>
 <div class="title-footer" style="    text-align: center;
    background: #FF9E6E;
    height: 13vh;">
    <h6 style="    padding-top: 40px;
    font-size: 19px;
    font-weight: bold;">CV. Jaya Setya Plastik</h6>
    <p style="font-weight: bold;
    font-size: 19px;">Jl. Raya Demak-Kudus KM. 19, Kec. Karanganyar, Kab. Demak, Jawa Tengah  59582    </p>
</div>
</section> --}}
{{-- <section class="header content-produk">
 <div class="container-fluid">
     <div class="title" data-aos="fade-down-left" data-aos-duration="1500">
         <h1>Produk Unggulan</h1>
     </div>
     <div class="slider" data-aos="fade-down-right" data-aos-duration="1500">
         <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/a.png" alt="">
             </a>
         </div>
         <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/b.png" alt="">
             </a>
         </div>
         <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/c.png" alt="">
             </a>
         </div>
         <!-- <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/d.png" alt="">
             </a>
         </div> -->
         <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/f.png" alt="">
             </a>
         </div>
         <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image/e.png" alt="">
             </a>
         </div>
         <!-- <div class="slider-list">
             <a href="produk-list.html">
                 <img src="assets/img/image-terbaru/" alt="">
             </a>
         </div> -->
     </div>
 </div>
</section> --}}

{{-- <section class="footer">

<div class="container text-center" style="padding-bottom: 100px;">
   <div class="row">
     <div class="col-md-6 col-lg-6 text-start">
       <div class="footer-title">
         <img src="assets/img/5.png" alt="">
         <h3>Jaya Setya Plastik <br>
         Toys Manufacturing</h3>
       </div>
       <div class="footer-address">
         JL Raya Demak-Kudus KM.19 Kec. Karanganyar Kab. Demak Jawa Tengah
       </div>
       <div class="logo">
           <ul>
             <li>
               <img src="assets/img/company/logo/SNI.png" alt="" >
             </li>
             <li>
               <img src="assets/img/company/logo/KAN.png" alt="">
             </li>
             <li>
               <img src="assets/img/company/logo/ISO.png" alt="">
             </li>
           </ul>
       </div>
     </div>
     <div class="col-md-6 col-lg-6 text-start">
      <div class="media">
       <h3>Ikuti Sosial Media Kami</h3>
       <p>Dapatkan informasi dari sosial media kami</p>
       <div class="footer-sosmed">
         <ul class="sosmed">
          <li>
            <img src="assets/img/company/logo/instagram.png" alt="">
          </li>
          <li>
            <img src="assets/img/company/logo/facebook.png" alt="">
          </li>
          <li>
            <img src="assets/img/company/logo/youtube.png" alt="">
          </li>
         </ul>
        </div>
      </div>
     </div>
   </div>
</div>
</section> --}}

@endsection
@push('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="{{ asset('frontend/assets/xzoom/xzoom.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/xzoom/xzoom.min.css') }}">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Kanit:ital@1&family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,300&family=Titan+One&family=Work+Sans:wght@700;800;900&family=Ysabeau+SC:wght@1&display=swap');
    * {
        font-family: 'Roboto', sans-serif;

    }
    .content .gambar .images {
        height: 47vh;
        background: #535353;
        margin-top: 15px;
        position: relative;
    }
    .content .gambar .images::before {
        content: " ";
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        opacity: 0.5;
        background: url("frontend/assets/image/mainan.jpg") no-repeat center center;
        background-size: cover;
    }
    .content .gambar .title{
        position: absolute;
        z-index: 2;
        color: white;
        margin-top: 190px;
        margin-left: 112px;
        width: 27%;
    }
    .content .gambar .title h5{
        font-size: 40px;
        font-weight: bolder;
        margin-bottom: 50px;
    }
    .content .gambar .title a{
        text-decoration: none;
        background: #ff9900;
        color: white;
        padding: 7px 22px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
    }
    .content .gambar .title a:hover{
        text-decoration: none;
        background: #da8302;
        color: white;
        padding: 7px 22px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
    }
    .content .gambar .img {
        height: 47vh;
        background: #535353;
        margin-top: 15px;
        position: relative;
    }
    .content .gambar .img::before {
        content: " ";
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        opacity: 0.5;
        background: url("frontend/assets/image/mainan2.jpg") no-repeat center center;
        background-size: cover;
    }
    .all-brand .row a{
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #D9D9D9;
        box-shadow: 3px 0px 18px 1px #D9D9D9;
        width: 15%;
        height: 13vh;
    }
    .all-brand .row a:hover{
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #bdbdbd;
        box-shadow: 3px 0px 18px 1px #bdbdbd;
        width: 15%;
        height: 13vh;
    }
    .all-brand .row a .col-2{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    /* .first-header img{
        width: 100%;
        height: 100vh;
    }
    .second-header{
        height: 100vh;
        position: relative;
      }
      .second-header .content {
        position: absolute;
        top: 0%;
      }
      .second-header .profile {
        margin-top: 4%;
      }
    .second-header h1{
      text-align: center;
      font-weight: bolder;
      color: white;
    }
    .second-header .video iframe{
      width: 100%;
      height: 800px;
    }
    .second-header img{
        width: 100%;
    } */
    /* .second-header .image{
      position: relative;
      background: rgb(0, 0, 0);
      height: 100vh;
      display: flex;
      justify-content: center;
    }
    .second-header .image::before{
      content: ' ';
      display: block;
      position: absolute;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
      opacity: 0.3;
      background: url("frontend/assets/image/biji-plastik.jpg");
      background-size: cover;
      background-attachment: fixed;
    } */
    /* .second-header h1{
      font-weight: bolder;
      letter-spacing: 3px;
      font-size: 4em;
      text-shadow: darkgray 1px 2px;
    }
    .second-header p{
      font-size: 1em;
    }
    .second-header h1{
      color: #5488ff;
    }
    .second-header{
      color: #fff;
      position: relative;
    }
    .second-header .title {
      position: absolute;
      top: 50%;
      text-align: center;
    }
    .second-header .image{
      position: relative;
      background: rgb(0, 0, 0);
      height: 100vh;
      display: flex;
      justify-content: center;
    }
    .second-header .image::before{
      content: ' ';
      display: block;
      position: absolute;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
      opacity: 0.5;
      background: url("assets/img/header/biji-plastik.jpg");
      background-size: cover;
      background-attachment: fixed;
    }
    .second-header .second .image img{
      height: 100vh;
      width: 100vw;
      object-fit: cover;
    }
    .second-header .btn-lanjut {
      margin-top: 5%;
    }
    .second-header a {
    text-decoration: none;
    color: rgb(179, 146, 0);
    background-color: #2c8808;
    padding: 15px 25px;
    z-index: 2;
    }
    .second-header a:hover {
        text-decoration: none;
        color: rgb(255, 208, 0);
        background-color: #31a503;
        padding: 15px 25px;
    } */

    /* .content-produk .title h1{
      color: #5488ff;
      text-align: center;
      font-weight: bolder;
      margin-top: 8px;
      margin-bottom: -25px;
      text-shadow: darkgray 1px 2px;
    }
    .content-produk img{
        margin-top: 25%;
        margin-bottom: 25%;
         width: 80%;
        padding-left: 10%;
    }
    .content-produk .slider-list {
      padding-left: 10%;
    } */

    /* .footer {
      background-color: #E9F8F9;

    }
    .footer .footer-title {
      font-style: italic;
      display: flex;
      align-items: center;
      margin-top: 5%;
      margin-bottom: 2%;
    }
    .footer .footer-title img{
      width: 50px;
    }
    .footer .footer-address{
      font-style: italic;
      font-size: 15px;
    }
    .footer .footer-title h3{
      font-weight: bolder;
      font-size: 20px;
      padding-left: 2%;
      text-shadow: #fff 1px 1px;
    }
    .footer .footer-sosmed ul{
      display: flex;
      margin-left: -35px;
    }
    .footer .footer-sosmed ul li{
      text-decoration: none;
      list-style-type: none;
      margin-left: 5px;
    }
    .footer .footer-sosmed img{
      width: 30px;
    }
    .footer .media{
      font-style: italic;
      margin-top: 5%;
      margin-bottom: 2%;
      font-size: 15px;

    }
    .footer .media h3{
      font-weight: bolder;
      text-shadow: #fff 1px 1px;
      font-size: 20px;

    }
    .footer .logo {
        margin-top: 25px;
    }
    .footer .logo img{
        width: 40px;
    }
    .footer .logo ul{
      display: flex;
      margin-left: -35px;
    }
    .footer .logo ul li{
      text-decoration: none;
      list-style-type: none;
      margin-left: 5px;
    } */
    @media screen and (max-width: 1400px) {
      .first-header img{
        width: 100%;
        height: 90vh;
      }
      /* .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 45%;
        text-align: center;
      }
      .second-header .image{
      position: relative;
      background: rgb(0, 0, 0);
      height: 90vh;
      display: flex;
      justify-content: center;
    }
    .second-header .image::before{
      content: ' ';
      display: block;
      position: absolute;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
      opacity: 0.5;
      background: url("assets/img/header/biji-plastik.jpg");
      background-size: cover;
      background-attachment: fixed;
      background-position: center;

    }
      .second-header .second .image img{
        height: 90vh;
        width: 100vw;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 1150px) {
      .first-header img{
        width: 100%;
        height: 85vh;
      }
      /* .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 43%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 85vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 85vh;
        width: 100vw;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 1000px) {
      .first-header img{
        width: 100%;
        height: 80vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 4em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 1em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 40%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 80vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 80vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 860px) {
      .first-header img{
        width: 100%;
        height: 75vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 3em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 1em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 75vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 75vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 780px) {
      .first-header img{
        width: 100%;
        height: 70vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 3em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 70vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 70vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 700px) {
      .first-header img{
        width: 100%;
        height: 65vh;
      }

      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 65vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 65vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 640px) {
      .first-header img{
        width: 100%;
        height: 60vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 60vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 60vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 570px) {
      .first-header img{
        width: 100%;
        height: 55vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 55vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 55vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 500px) {
      .first-header img{
        width: 100%;
        height: 50vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 50vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 50vh;
        width: 100%;
        object-fit: cover;
      } */
      .footer .footer-title img{
          width: 40px;
        }
        .footer .footer-address{
          font-style: italic;
          font-size: 12px;
        }
        .footer .footer-title h3{
          font-weight: bolder;
          font-size: 18px;
          padding-left: 2%;
          text-shadow: #fff 1px 1px;
        }
        .footer .footer-sosmed img{
          width: 20px;
        }
        .footer .media{
          font-style: italic;
          margin-top: 5%;
          margin-bottom: 2%;
          font-size: 12px;

        }
        .footer .media h3{
          font-weight: bolder;
          text-shadow: #fff 1px 1px;
          font-size: 18px;

        }
        .footer .logo {
            margin-top: 25px;
        }
        .footer .logo img{
            width: 20px;
        }
        .footer .logo ul{
          display: flex;
          margin-left: -35px;
        }
        .footer .logo ul li{
          text-decoration: none;
          list-style-type: none;
          margin-left: 5px;
        }
    }
    @media screen and (max-width: 450px) {
      .first-header img{
        width: 100%;
        height: 45vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 45vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 45vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 400px) {
      .first-header img{
        width: 100%;
        height: 40vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 40vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 40vh;
        width: 100%;
        object-fit: cover;
      } */
    }
    @media screen and (max-width: 350px) {
      .first-header img{
        width: 100%;
        height: 35vh;
      }
      /* .second-header h1{
        font-weight: bolder;
        letter-spacing: 3px;
        font-size: 2.5em;
        text-shadow: darkgray 1px 2px;
      }
      .second-header p{
        font-size: 0.9em;
      }
      .second-header .second {
        position: relative;
        display: flex;
        justify-content: center;
      }
      .second-header .title {
        position: absolute;
        top: 38%;
        text-align: center;
      }
      .second-header .image{
        position: relative;
        background: rgb(0, 0, 0);
        height: 40vh;
        display: flex;
        justify-content: center;
      }
      .second-header .image::before{
        content: ' ';
        display: block;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background: url("assets/img/header/biji-plastik.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      .second-header .second .image img{
        height: 40vh;
        width: 100%;
        object-fit: cover;
      } */
    }
</style>
@endpush
@push('script')
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/zoomsl/zoomsl.js') }}"></script>
<script src="{{ asset('frontend/assets/xzoom/xzoom.min.js') }}"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.slim.js"></script> -->
<script src="assets/slick-1.8.1/slick/slick.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="	https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js"></script>
<!-- <script>
    $(function() {
          $.scrollify({
            section : ".header",
            scrollSpeed: 1100,
          });
        });
</script> -->
<script>
    $(document).ready(function(){
        $('.x-zoom').imagezoomsl({
            zoomrange: [3,2],
            zoomwidth: 100
        });
    });
  $(document).ready(function(){
    AOS.init({
        offset: 120,
    });
$('.slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
   })
</script>
@endpush
