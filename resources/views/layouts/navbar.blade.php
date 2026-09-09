                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="background-color: transparent !important; box-shadow: none !important;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search is moved to Sidebar -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Cari..." aria-label="Search"
                                            aria-describedby="basic-addon2" style="border-top-left-radius: 25px; border-bottom-left-radius: 25px; padding-left: 1.25rem;">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" style="border-top-right-radius: 25px; border-bottom-right-radius: 25px; padding-right: 1.25rem;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi Sistem
                                </h6>
                                
                                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.notifications.read', $notification->id) }}">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-{{ $notification->data['type'] ?? 'primary' }}">
                                                <i class="{{ $notification->data['icon'] ?? 'fas fa-bell' }} text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                                            <span class="font-weight-bold">{{ $notification->data['message'] ?? 'Ada pemberitahuan baru.' }}</span>
                                        </div>
                                    </a>
                                @empty
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada notifikasi baru</a>
                                @endforelse
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.notifications.readAll') }}">Tandai semua dibaca</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages (Sembunyikan) -->
                        <!-- 
                        <li class="nav-item dropdown no-arrow mx-1">
                           ...
                        </li> 
                        -->

                    </ul>

                </nav>
