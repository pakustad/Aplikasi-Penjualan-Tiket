<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('') }}" class="brand-link">
    <img src="{{ url('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Tiketing</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ url('home') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
              Kategori
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('kategori.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kategori.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tiket.index') }}">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
              Tiket
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('tiket.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tiket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tiket.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Tiket</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('transaksi.index') }}">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('transaksi.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('transaksi.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('tiket.index') }}">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Laporan Penjualan
          <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('transaksi.laporan') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan PDF</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('laporan.excel') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Excel</p>
            </a>
          </li>
        </ul>
        </li> --}}
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off"></i>
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>