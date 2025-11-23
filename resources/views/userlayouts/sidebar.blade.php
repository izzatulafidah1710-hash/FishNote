        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('template/img/logofishnote.png') }}" width="80" class="img-fluid">
                </div>
                <div class="sidebar-brand-text">FishNote</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboarduser') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboarduser">
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
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pencatatan</span></a>
            </li>

            <!-- Nav Item - data panen -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Panen</span></a>
            </li>

             <!-- Nav Item - promosi -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Promosi</span>
                </a>
            </li>

             <!-- Nav Item - daftar promosi -->
           <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-bars"></i>
                     <span>Daftar Promosi</span>
                </a>
            </li>

            <!-- Nav Item - laporan -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Nav Item -riwayat pencatatan -->
            <li class="nav-item">
                <a class="nav-link" href="">
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
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
