<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/din.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
             <a href="#" class="d-block">{{ Auth::User()->name }}</a>
            @else
          <a href="#" class="d-block">Alexander Pierce</a>
          @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @auth

                {{-- INI KHUSUS SIDEBAR ADMIN --}}
                @if (Auth::user()->type == 2)
                    <li class="nav-item has-treeview">
                        <a href="{{ url("admin") }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ Request::is('admin/content/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('admin/content/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                        Content
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("anakpanti.index") }}" class="nav-link {{ Request::is('admin/content/anakpanti') ? 'active' : '' }}">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Data Anak Asuh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("kegiatan.index") }}" class="nav-link {{ Request::is('admin/content/kegiatan') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon"></i>
                            <p>Data Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("galeri.index") }}" class="nav-link {{ Request::is('admin/content/galeri') ? 'active' : '' }}">
                            <i class="fa fa-image nav-icon"></i>
                            <p>Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("konfirmasi.index") }}" class="nav-link {{ Request::is('admin/content/konfirmasi') ? 'active' : '' }}">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Konfirmasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("donasi.index") }}" class="nav-link {{ Request::is('admin/content/donasi') ? 'active' : '' }}">
                            <i class="fa fa-money-check nav-icon"></i>
                            <p>Donasi</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                @endif

                {{-- INI KHUSUS SIDEBARNYA USER --}}
                @if (Auth::user()->type == 1)
                <li class="nav-item has-treeview">
                    <a href="{{ url("user") }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif
            @endauth


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
