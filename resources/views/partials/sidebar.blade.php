<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/bnlogo.png') }}" alt="" style="height: 50px;">
            </span>
            <div class="row app-brand-text ms-2">
                <span class="text-primary fw-bold fs-5">Uang Anak</span>
                <span class="text-primary fw-bold fs-5">Bangsa</span>
            </div>
            
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-5">
        <!-- Dashboard -->
        

        @if (Auth::user()->role->role == 'admin' || Auth::user()->role->role == 'pamong')
            <li class="menu-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                <a href="{{ route('welcome') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item {{ request()->routeIs('data-siswa', 'tambah-siswa') ? 'active' : '' }}">
                <a href="{{ route('data-siswa') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Data Siswa</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('tabungan-admin') ? 'active' : '' }}">
                <a href="{{ route('tabungan-admin') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                    <div data-i18n="Analytics">Saldo Siswa</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('indexRekamKeuangan', 'transaksiNowIndex') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                  <div data-i18n="Account Settings">Rekam Keuangan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('transaksiNowIndex') ? 'active' : '' }}">
                        <a href="{{ route('transaksiNowIndex') }}" class="menu-link">
                          <div data-i18n="Account">Transaksi Hari Ini</div>
                        </a>
                      </li>
                  <li class="menu-item {{ request()->routeIs('indexRekamKeuangan') ? 'active' : '' }}">
                    <a href="{{ route('indexRekamKeuangan') }}" class="menu-link">
                      <div data-i18n="Account">History Transaksi</div>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="menu-item {{ request()->routeIs('catatanKeuanganIndex') ? 'active' : '' }}">
                <a href="{{ route('catatanKeuanganIndex') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div data-i18n="Analytics">Catatan Keuangan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('indexJurusan', 'indexDeleteReq') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Umum</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('indexDeleteReq') ? 'active' : '' }}">
                        <a href="{{ route('indexDeleteReq') }}" class="menu-link">
                          <div data-i18n="Account">Hapus Data Keuangan</div>
                        </a>
                      </li>
                  <li class="menu-item {{ request()->routeIs('indexJurusan') ? 'active' : '' }}">
                    <a href="{{ route('indexJurusan') }}" class="menu-link">
                      <div data-i18n="Account">Jurusan</div>
                    </a>
                  </li>


                </ul>
            </li>
        @endif
        @if (Auth::user()->role->role == 'siswa')
            <li class="menu-item {{ request()->routeIs('home-siswa') ? 'active' : '' }}">
                <a href="{{ route('home-siswa') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item {{ request()->routeIs('tabunganIndex') ? 'active' : '' }}">
                <a href="{{ route('tabunganIndex') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                    <div data-i18n="Analytics">Tabungan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('tariksaldo-siswa') ? 'active' : '' }}">
                <a href="{{ route('tariksaldo-siswa') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-wallet"></i>
                    <div data-i18n="Analytics">Tarik Saldo</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->role->role == 'dewa')
        <li class="menu-item {{ request()->routeIs('dewaUser2696') ? 'active' : '' }}">
            <a href="{{ route('dewaUser2696') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Data User</div>
            </a>
        </li>
        @endif
        
    </ul>
</aside>
