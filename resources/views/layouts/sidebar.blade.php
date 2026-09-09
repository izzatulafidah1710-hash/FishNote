        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('images/logo.png') }}" width="80" class="img-fluid">
                </div>
                <div class="sidebar-brand-text">FishNote</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Admin</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Pengguna
            </div>

            <!-- Nav Item - Data Peternak -->
            <li class="nav-item {{ request()->is('admin/datapeternak*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.datapeternak.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Peternak</span>
                </a>
            </li>

            <!-- Nav Item - data promosi -->
            <li class="nav-item {{ request()->is('admin/datapromosi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.promotions.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Promosi</span>
                </a>
            </li>

            <!-- Nav Item - aktivitas peternak -->
            <li class="nav-item {{ request()->is('admin/aktivitas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.aktivitas.index') }}">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Aktivitas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Akun
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" style="margin-top: 1rem; margin-bottom: 0;">

            <!-- Bottom User Profile & Logout -->
            <div class="sidebar-user-footer">
                <a href="{{ route('infoakun.index') ?? '#' }}" class="sidebar-profile-box" style="text-decoration: none;">
                    <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Admin Avatar">
                    <div class="sidebar-profile-info">
                        <span class="sidebar-profile-name">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="sidebar-profile-email">{{ Auth::user()->email ?? 'admin@fishnote.com' }}</span>
                    </div>
                    <i class="fas fa-chevron-right" style="color: #cbd5e1; font-size: 0.8rem; margin-right: 0.5rem;"></i>
                </a>
                
                <a href="#" class="sidebar-logout-btn" onclick="event.preventDefault(); confirmLogout();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log out</span>
                </a>
            </div>

            <!-- Form Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <!-- Script SweetAlert (Letakkan sebelum penutup </body> di layout) -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function confirmLogout() {
                    Swal.fire({
                        title: 'Keluar?',
                        text: "Apakah Anda yakin ingin keluar dari sistem?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Keluar!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                }
            </script>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
