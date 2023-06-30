<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Checkout Berhasil</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
       <section class="w-100" style="box-sizing: border-box; background-image: linear-gradient(to bottom, rgba(31, 29, 43, 1), rgba(39, 37, 53, 1)); height: 100vh;">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        .empty-3-2{
            padding: 5rem 2rem;
        }
        .empty-3-2 .main-img{
            width: 83.333333%;
            margin-bottom: 2.5rem;
            object-fit: cover;
            object-position: center;
        }
        .empty-3-2 .title-text{
            font: 600 1.875rem/2.25rem Poppins, sans-serif;
            letter-spacing: 0.025em;
            margin-bottom: 0.75rem;
        }
        .empty-3-2 .caption-text{
            margin-bottom: 3rem;
            color: #848486;
            font-size: 1rem;
            letter-spacing: 0.025em;
            line-height: 1.75rem;
        }
        .empty-3-2 .btn-pesan{
            font: 600 1.125rem/1.75rem Poppins, sans-serif;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            background-color: #00a336;
            transition: 0.3s;
        }
        .empty-3-2 .btn-pesan:hover{
            background-color: #00d146;
            transition: 0.3s;
        }
        .empty-3-2 .btn-view{
            font: 600 1.125rem/1.75rem Poppins, sans-serif;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            background-color: #6C5ECF;
            transition: 0.3s;
        }
        .empty-3-2 .btn-view:hover{
            background-color: #7370FF;
            transition: 0.3s;
        }
        @media (min-width: 576px) {
            .empty-3-2{
                padding: 8rem 2rem;
            }
            .empty-3-2 .main-img{
                width: auto;
            }
        }
        @media (max-width: 576px) {
            .baten {
                height: 5vh;
            }
            .empty-3-2 .btn-pesan {
                font: 600 1.125rem/1.75rem Poppins, sans-serif;
                padding: 7px 18px;
                border-radius: 0.75rem;
                background-color: #00a336;
                transition: 0.3s;
                font-size: 13px;
            }
            .empty-3-2 .btn-view {
                font: 600 1.125rem/1.75rem Poppins, sans-serif;
                padding: 7px 18px;
                border-radius: 0.75rem;
                background-color: #6C5ECF;
                transition: 0.3s;
                font-size: 13px;
            }
        }
        @media (max-width: 373px)
        {
            .empty-3-2 .title-text {
                font: 600 1.875rem/2.25rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                margin-bottom: 0.75rem;
                font-size: 25px;
            }
            .empty-3-2 .title-text {
                font: 600 1.875rem/2.25rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                margin-bottom: 0.75rem;
                font-size: 25px;
            }
            .empty-3-2 .btn-pesan {
                font: 600 1.125rem/1.75rem Poppins, sans-serif;
                padding: 7px 18px;
                border-radius: 0.75rem;
                background-color: #00a336;
                transition: 0.3s;
                font-size: 9px;
            }
            .empty-3-2 .btn-view {
                font: 600 1.125rem/1.75rem Poppins, sans-serif;
                padding: 7px 18px;
                border-radius: 0.75rem;
                background-color: #6C5ECF;
                transition: 0.3s;
                font-size: 9px;
            }

        }
    </style>
    <div class="empty-3-2" style="font-family: 'Poppins', sans-serif;">
        <div class="mx-auto d-flex align-items-center justify-content-center flex-column">
            <img class="main-img" src="{{ asset('frontend/assets/image/shopping-cart (1).png') }}" alt="">
            <div class="text-center w-100">
                <h1 class="title-text text-white">
                    Checkout Berhasil
                </h1>
                <p class="caption-text">
                   Pesanan Anda akan diproses oleh kami
                </p>
                <div class="d-flex justify-content-center baten">
                    <a href="{{ url('status/konfirmasi/'. Auth::user()->id ) }}" class="btn btn-pesan d-inline-flex text-white">
                        Lihat Pesanan
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-view d-inline-flex mx-3 text-white">
                        Halaman Depan
                    </a>
                </div>
            </div>
        </div>
    </div>
  </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>
