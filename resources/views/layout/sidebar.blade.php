<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            SMK<span>PGRI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            @auth('petugas')
                <li class="nav-item {{ active_class(['/']) }}">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Master Data</li>
            @endauth
            {{--      <li class="nav-item {{ active_class(['email/*']) }}"> --}}
            {{--        <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email"> --}}
            {{--          <i class="link-icon" data-feather="mail"></i> --}}
            {{--          <span class="link-title">Email</span> --}}
            {{--          <i class="link-arrow" data-feather="chevron-down"></i> --}}
            {{--        </a> --}}
            {{--        <div class="collapse {{ show_class(['email/*']) }}" id="email"> --}}
            {{--          <ul class="nav sub-menu"> --}}
            {{--            <li class="nav-item"> --}}
            {{--              <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}">Inbox</a> --}}
            {{--            </li> --}}
            {{--            <li class="nav-item"> --}}
            {{--              <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}">Read</a> --}}
            {{--            </li> --}}
            {{--            <li class="nav-item"> --}}
            {{--              <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}">Compose</a> --}}
            {{--            </li> --}}
            {{--          </ul> --}}
            {{--        </div> --}}
            {{--      </li> --}}
            @if (Auth::guard('petugas')->check())
                @php
                    $petugas = Auth::guard('petugas')->user()->level
                @endphp
                @if ($petugas == 'admin')
                    <li class="nav-item {{ active_class(['admin/master-data/spp']) }}">
                        <a href="{{ url('/admin/master-data/spp') }}" class="nav-link">
                            <i class="link-icon" data-feather="dollar-sign"></i>
                            <span class="link-title">Master SPP</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['admin/master-data/kelas']) }}">
                        <a href="{{ url('/admin/master-data/kelas') }}" class="nav-link">
                            <i class="link-icon" data-feather="list"></i>
                            <span class="link-title">Master Kelas</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['admin/master-data/siswa']) }}">
                        <a href="{{ url('/admin/master-data/siswa') }}" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['admin/petugas']) }}">
                        <a href="{{ url('/admin/petugas') }}" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Petugas</span>
                        </a>
                    </li>
                @endif
            @endif
            @auth('petugas')
                <li class="nav-item {{ active_class(['admin/pembayaran']) }}">
                    <a href="{{ url("/$petugas/pembayaran") }}" class="nav-link">
                        <i class="link-icon" data-feather="pocket"></i>
                        <span class="link-title">Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['admin/laporan']) }}">
                    <a href="{{ url("/$petugas/laporan") }}" class="nav-link">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">Laporan</span>
                    </a>
                </li>
            @endauth
            @auth('siswa')
                <li class="nav-item {{ active_class(['siswa']) }}">
                    <a href="{{ url('/siswa') }}" class="nav-link">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">Riwayat Pembayaran</span>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                        value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                        value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
    </div>
</nav>
