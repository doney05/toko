<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jaya Setya Plastik</title>
    @include('include.style')
    @stack('style')

</head>
<body>
    <section class="hero">
        @include('include.navbar')
        {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Jaya Setya Plastik</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#collapseExample" role="button" data-bs-toggle="collapse" aria-expanded="false">
                      Produk
                    </a>
                    <ul class="collapse" id="collapseExample">
                      <div class="card card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Riwayat Pemesanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Alamat Kami</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav> --}}
    </section>
    <main class="isi">
        @yield('content')

    </main>
</body>
@include('include.script')
@stack('script')

</html>
