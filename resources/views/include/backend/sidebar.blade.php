<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <div class="dropdown-divider"></div>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('brand.index')}}">
          <span class="menu-title">Produk</span>
          <i class="mdi mdi-crosshairs-gps  menu-icon"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-account menu-icon"></i>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-account menu-icon"></i>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-settings-box menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 0)->get()->count())
                <li class="nav-item "> <a class="nav-link" href="{{ route('belum_bayar.index') }}">Belum Bayar
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('belum_bayar.index') }}">Belum Bayar
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 1)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('dibayar.index')}}">Sudah Dibayar
                    <span class="badge bg-danger">{{ $log }} </span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('dibayar.index')}}">Sudah Dibayar
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 2)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('dikirim.index')}}">Dikirim
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('dikirim.index')}}">Dikirim
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 3)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('selesai.index')}}">Selesai
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('selesai.index')}}">Selesai
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 4)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('batal.index')}}">Dibatalkan
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('batal.index')}}">Dibatalkan
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Riwayat Pembelian</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-settings-box menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 3)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('riwayat.success') }}">Sukses
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('riwayat.success') }}">Sukses
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
            @if ($log = \App\Models\Payment::with(['user.detail', 'user.cart.item'])->where('status', '=', 4)->get()->count())
                <li class="nav-item"> <a class="nav-link" href="{{ route('riwayat.batal')}}">Batal
                    <span class="badge bg-danger">{{ $log }}</span>
                </a></li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('riwayat.batal')}}">Batal
                    <span class="badge bg-danger">0</span>
                </a></li>
            @endif
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('brand.index')}}">
          <span class="menu-title">Rekap Penjualan</span>
          <i class="mdi mdi-calendar  menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Pengaturan</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-settings-box menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('alamat.index') }}">Alamat Toko</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Rekening</a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="{{ route('akses.index')}}">Akses Kompetitor</a></li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>

