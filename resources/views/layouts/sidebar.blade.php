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

            <!-- Nav Item - data peternak -->
            <li class="nav-item {{ request()->is('datapeternak*') ? 'active' : '' }}">
                <a class="nav-link" href="/datapeternak">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Peternak</span></a>
            </li>

             <!-- Nav Item - data promosi -->
            <li class="nav-item {{ request()->is('datapromosi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('datapromosi.index') }}">
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
            <li class="nav-item {{ request()->is('aktivitas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('aktivitas.index') }}">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Aktivitas</span></a>
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
