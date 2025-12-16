        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboardadmin">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('template/img/logo1.png') }}" width="80" class="img-fluid">
                </div>
                <div class="sidebar-brand-text">FishNote</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboardadmin') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboardadmin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard Admin</span></a>
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

            <!-- Nav Item - info akun peternak -->
            <li class="nav-item {{ request()->is('infoakunpeternak') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('infoakun.index') }}">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Info Akun Peternak</span>
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
