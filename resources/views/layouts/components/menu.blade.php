<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class='bx bxs-ghost bx-md'></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Inventory</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @if ( Auth::user()->position->role_as == 1 )
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class='menu-icon bx bx-home'></i>
                <span>Dashboard</span>
            </a>
        </li>
        @endif

        <li class="menu-item {{ Request::is('profile') ? 'active' : '' }}">
            <a href="{{ url('profile') }}" class="menu-link">
                <i class='menu-icon bx bx-user-circle' ></i>
                <span">Profile</span>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>
        
        @if ( Auth::user()->position->role_as == 1 )
        <li class="menu-item {{ Request::is('user-management', 'position') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-group' ></i>
                <span">Pengguna</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('user-management') ? 'active' : '' }}">
                <a href="{{ url('user-management') }}" class="menu-link">
                    <span>Pengguna</span>
                </a>
                </li>
                <li class="menu-item {{ Request::is('position') ? 'active' : '' }}">
                <a href="{{ url('position') }}" class="menu-link">
                    <span>Jabatan</span>
                </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('request', 'incoming', 'suplier') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-box'></i>
                <span>Manajemen Barang</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('suplier') ? 'active' : '' }}">
                    <a href="{{ url('suplier') }}" class="menu-link">
                        <span>Suplier</span>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('request') ? 'active' : '' }}">
                    <a href="{{ url('request') }}" class="menu-link">
                        <span>Permintaan</span>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('incoming') ? 'active' : '' }}">
                    <a href="{{ url('incoming') }}" class="menu-link">
                        <span>Barang Masuk</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <li class="menu-item {{ Request::is('inventory') ? 'active' : '' }}">
            <a href="{{ url('inventory') }}" class="menu-link">
                <i class='menu-icon bx bx-archive' ></i>
                <span>Inventaris</span>
            </a>
        </li>
        <li class="menu-item {{ Request::is('submission') ? 'active' : '' }}">
            <a href="{{ url('submission') }}" class="menu-link">
                <i class='menu-icon bx bx-user-voice' ></i>
                <span>Pengajuan</span>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Setting</span></li>

        <li class="menu-item {{ Request::is('edit-profile') ? 'active' : '' }}">
            <a href="{{ url('edit-profile') }}" class="menu-link">
                <i class='menu-icon bx bx-user' ></i>
                <span>Ubah Profile</span>
            </a>
        </li>
        <li class="menu-item {{ Request::is('edit-password') ? 'active' : '' }}">
            <a href="{{ url('edit-password') }}" class="menu-link">
                <i class='menu-icon bx bx-key' ></i>
                <span>Ubah Password</span>
            </a>
        </li>

        <li class="menu-item mt-4">
            <a href="{{ route('logout') }}" class="menu-link bg-secondary text-white"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                <i class='menu-icon bx bx-log-out' ></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside>