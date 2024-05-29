<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class="fa-solid fa-graduation-cap fa-2x"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Sneat</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>

        @if ( Auth::user()->position->role_as == 1 )
        <li class="menu-item {{ Request::is('user-management', 'position') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">Pengguna</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('user-management') ? 'active' : '' }}">
                <a href="{{ url('user-management') }}" class="menu-link">
                    <div data-i18n="Account">Pengguna</div>
                </a>
                </li>
                <li class="menu-item {{ Request::is('position') ? 'active' : '' }}">
                <a href="{{ url('position') }}" class="menu-link">
                    <div data-i18n="Notifications">Jabatan</div>
                </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('request', 'incoming', 'suplier') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-folder-open"></i>
                <div data-i18n="Inventory">Manajemen Barang</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('suplier') ? 'active' : '' }}">
                    <a href="{{ url('suplier') }}" class="menu-link">
                        <div data-i18n="Suplier">Suplier</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('request') ? 'active' : '' }}">
                    <a href="{{ url('request') }}" class="menu-link">
                        <div data-i18n="Notifications">Permintaan</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('incoming') ? 'active' : '' }}">
                    <a href="{{ url('incoming') }}" class="menu-link">
                        <div data-i18n="Notifications">Barang Masuk</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <li class="menu-item {{ Request::is('inventory') ? 'active' : '' }}">
            <a href="{{ url('inventory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Account">Inventaris</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('submission') ? 'active' : '' }}">
            <a href="{{ url('submission') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Suplier">Pengajuan</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Setting</span></li>

        <li class="menu-item {{ Request::is('profile', 'edit-profile', 'edit-password') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid fa-chalkboard-user me-3"></i>
                <div data-i18n="Inventory">Akun</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('profile') ? 'active' : '' }}">
                    <a href="{{ url('profile') }}" class="menu-link">
                        <div data-i18n="Basic">Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('edit-profile') ? 'active' : '' }}">
                    <a href="{{ url('edit-profile') }}" class="menu-link">
                        <div data-i18n="Basic">Ubah Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('edit-password') ? 'active' : '' }}">
                    <a href="{{ url('edit-password') }}" class="menu-link">
                        <div data-i18n="Basic">Ubah Password</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item mt-4">
            <a href="{{ route('logout') }}" class="menu-link bg-secondary text-white"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                <i class="fa-solid fa-right-from-bracket me-3 fa-rotate-180"></i>
                <div data-i18n="Basic">Keluar</div>
            </a>
        </li>
    </ul>
</aside>