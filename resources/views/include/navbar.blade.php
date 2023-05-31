<nav class="nav-first">
    <div class="wrapper">
        <div class="logo"><img src="{{ asset('frontend/assets/image/Asset 1.png') }}" alt=""
            style="width: 50%"></div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li>
                <a href="{{ route('home') }}" class="{{ Request::path() === '/' ? 'bg-dark' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="#" class="desktop-item ">Produk</a>
                <input type="checkbox" id="showMega">
                <label for="showMega" class="mobile-item">Produk</label>
                <div class="mega-box">
                    <div class="content">
                        <?php
                            $produk = \App\Models\Product::all();
                        ?>
                        {{-- {{ dd(array_chunk($item[2], 2))}} --}}
                        <div class="row justify-content-center">
                            <ul class="mega-links">
                                @foreach ($produk as $item)
                                <li><a href="{{ url('produk/'.$item->id )}}" class="{{ Request::path() === 'produk/'.$item->id ? 'bg-dark' : '' }}">{{ $item->nama }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        {{-- <div class="row justify-content-center">
                            <ul class="mega-links">
                                <li><a href="#">Yogobata</a></li>
                                <li><a href="#">Ali Toys</a></li>
                                <li><a href="#">SW Toys</a></li>
                                <li><a href="#">MC Toys</a></li>
                            </ul>
                        </div>
                        <div class="row justify-content-center">
                            <ul class="mega-links">
                                <li><a href="#">Yogobata</a></li>
                                <li><a href="#">Ali Toys</a></li>
                                <li><a href="#">SW Toys</a></li>
                                <li><a href="#">MC Toys</a></li>
                            </ul>
                        </div>
                        <div class="row justify-content-center">
                            <ul class="mega-links">
                                <li><a href="#">Yogobata</a></li>
                                <li><a href="#">Ali Toys</a></li>
                                <li><a href="#">SW Toys</a></li>
                                <li><a href="#">MC Toys</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </li>
            <li><a href="{{ route('alamat')}}" class="alamat  {{ Request::path() === 'alamat' ? 'bg-dark' : '' }}">Alamat Kami</a></li>
            @guest
            <li>
                <form action="{{ route('login.index') }}">
                    <button type="submit">Masuk</button>
                </form>
            </li>
            @endguest
            @auth
            <li>
                <div class="dropdown">
                   <button class="dropbtn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border:none; width: 100%"><i class="fa-regular fa-user fa-lg"></i>
                      &nbsp; | &nbsp; {{ Auth::user()->name}}</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="border: 1px solid; background: rgb(214, 85, 0);">
                        <li><a class="dropdown-item droplist"
                           href="{{ url('status/konfirmasi/'. Auth::user()->id ) }}">Status Pengiriman</a></li>
                           <hr style="    color: #ffff; height: 2px;">
                        <li style="    margin-top: 26px;">
                            <form  action="{{ route('logout')}}" method="POST">
                                @csrf
                                    <button type="submit" style="margin-top: -10px; width: 81%; height: 40px;">Logout</button>
                            </form>
                        </li>
                    </ul>
               </div>
            </li>
         @endauth
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>
