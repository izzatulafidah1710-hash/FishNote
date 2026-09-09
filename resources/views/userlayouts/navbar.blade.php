<!-- Topbar / Navbar User -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="background-color: transparent !important; box-shadow: none !important;">

    <!-- Sidebar Toggle (Mobile) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search is moved to Sidebar -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Notifications -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifikasi Terbaru
                </h6>
                
                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.notifications.read', $notification->id) }}">
                        <div class="mr-3">
                            <div class="icon-circle bg-{{ $notification->data['type'] ?? 'primary' }}">
                                <i class="{{ $notification->data['icon'] ?? 'fas fa-bell' }} text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                            <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
                        </div>
                    </a>
                @empty
                    <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada notifikasi baru</a>
                @endforelse
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('user.notifications.readAll') }}">Tandai semua dibaca</a>
            </div>
        </li>

        <!-- Nav Item - Messages (Sembunyikan sementara) -->
        <!-- 
        <li class="nav-item dropdown no-arrow mx-1">
           ...
        </li> 
        -->

    </ul>

</nav>

<!-- Form Logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Custom CSS untuk Dropdown -->
<style>
.dropdown-header {
    padding: 0.5rem 1.5rem;
}

.dropdown-list {
    min-width: 20rem;
}

.icon-circle {
    height: 2.5rem;
    width: 2.5rem;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.img-profile {
    height: 2rem;
    width: 2rem;
}

.topbar-divider {
    width: 0;
    border-right: 1px solid #e3e6f0;
    height: calc(4.375rem - 2rem);
    margin: auto 1rem;
}
</style>