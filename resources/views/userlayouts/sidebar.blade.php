        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboarduser">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('template/img/logo1.png') }}" width="80" class="img-fluid">
                </div>
                <div class="sidebar-brand-text">FishNote</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboarduser') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.dashboarduser') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard Peternak</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Aktivitas Peternak
            </div>

            <!-- Nav Item - pencatatan -->
            <li class="nav-item {{ request()->is('user/pencatatan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.pencatatan.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pencatatan</span></a>
            </li>

            <!-- Nav Item - data panen -->
            <li class="nav-item {{ request()->is('user/panen*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.panen.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Panen</span></a>
            </li>

             <!-- Nav Item - promosi -->
            <li class="nav-item {{ request()->is('user/promosi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.promosi.index') }}">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Promosi</span>
                </a>
            </li>

             <!-- Nav Item - daftar promosi -->
           <li class="nav-item {{ request()->is('user/daftar-promosi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.daftar-promosi.index') }}">
                    <i class="fas fa-fw fa-bars"></i>
                     <span>Daftar Promosi</span>
                </a>
            </li>

            <!-- Nav Item - laporan -->
            <li class="nav-item {{ request()->is('user/laporan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.laporan.index') }}">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Nav Item -riwayat pencatatan -->
            <li class="nav-item {{ request()->is('user/riwayat*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.riwayat.index') }}">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Riwayat Pencatatan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Akun
            </div>

            <!-- Nav Item - keluar akun -->
            <!-- Menu Keluar dengan Konfirmasi SweetAlert -->
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault(); confirmLogout();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </li>

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
