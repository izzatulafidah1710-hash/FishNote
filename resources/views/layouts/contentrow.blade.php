<!-- Content Row: Small Cards -->
<div class="row">

    <!-- Pendapatan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pendapatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.240.000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Akun -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Request Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Presentase Tugas Yang Selesai</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Informasi Umum</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">99+</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Content Row: Charts -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Statistik Pendapatan Perbulan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Akun Yang Aktif</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2"><i class="fas fa-circle text-primary"></i> 12 Akun</span>
                    <span class="mr-2"><i class="fas fa-circle text-success"></i> 5 Akun</span>
                    <span class="mr-2"><i class="fas fa-circle text-info"></i> 0 Akun</span>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Content Row: Progres Budidaya -->
<div class="row">

    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fish mr-2"></i> Progres Budidaya
                </h6>
            </div>

            <div class="card-body">

                <!-- Item 1 -->
                <h4 class="small font-weight-bold">Persiapan Kolam <span class="float-right">100%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" style="width: 100%"></div>
                </div>

                <!-- Item 2 -->
                <h4 class="small font-weight-bold">Penebaran Benih <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" style="width: 80%"></div>
                </div>

                <!-- Item 3 -->
                <h4 class="small font-weight-bold">Pemberian Pakan <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" style="width: 60%"></div>
                </div>

                <!-- Item 4 -->
                <h4 class="small font-weight-bold">Pemantauan Pertumbuhan <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-primary" style="width: 40%"></div>
                </div>

                <!-- Item 5 -->
                <h4 class="small font-weight-bold">Panen & Pencatatan Hasil <span class="float-right">20%</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-danger" style="width: 20%"></div>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- Content Row: Card Ikan -->
<style>
    .card-ikan img {
        width: 55px;
        height: 55px;
        object-fit: contain;
        margin-right: 15px;
    }
</style>

<div class="row">

    <!-- Nila -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card shadow card-ikan">
            <div class="card-body d-flex">
                <img src="{{ asset ('template/img/nila.jpg') }}">
                <div>
                    <h5 class="mb-1">Ikan Nila</h5>
                    <p class="text-muted small mb-1">Paling banyak dipelihara</p>
                    <p class="font-weight-bold text-primary mb-0">45%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lele -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card shadow card-ikan">
            <div class="card-body d-flex">
                <img src="{{ asset ('template/img/lele.jpg') }}">
                <div>
                    <h5 class="mb-1">Ikan Lele</h5>
                    <p class="text-muted small mb-1">Peringkat ke-2</p>
                    <p class="font-weight-bold text-success mb-0">30%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gurame -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card shadow card-ikan">
            <div class="card-body d-flex">
                <img src="{{ asset ('template/img/gurame.jpg') }}">
                <div>
                    <h5 class="mb-1">Ikan Gurame</h5>
                    <p class="text-muted small mb-1">Peringkat ke-3</p>
                    <p class="font-weight-bold text-info mb-0">15%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Patin -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card shadow card-ikan">
            <div class="card-body d-flex">
                <img src="{{ asset ('template/img/patin.jpg') }}">
                <div>
                    <h5 class="mb-1">Ikan Patin</h5>
                    <p class="text-muted small mb-1">Peringkat ke-4</p>
                    <p class="font-weight-bold text-warning mb-0">10%</p>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Content Row: Illustration + Development -->
<div class="row">

    <!-- Tentang FishNote -->
    <div class="col-12 col-md-6 mb-4">
    <div class="card shadow-lg border-0 rounded-lg h-100">
        <div class="card-header py-3 d-flex align-items-center">
            <i class="fas fa-water fa-lg text-primary mr-2"></i>
            <h6 class="m-0 font-weight-bold text-primary">Tentang FishNote</h6>
        </div>

        <div class="card-body">

            <div class="text-center mb-3">
                <img src="{{ asset('template/img/logofishnote.png') }}"
                     class="img-fluid"
                     style="max-width: 120px; opacity: 0.9;">
            </div>

            <p class="text-gray-800" style="line-height: 1.6;">
                <span class="font-weight-bold text-primary">FishNote</span> adalah platform digital yang dirancang 
                untuk membantu peternak ikan mencatat aktivitas budidaya secara menyeluruh. 
                Proses penting seperti pemberian pakan, perkembangan ikan, kondisi kolam, hingga data panen 
                dapat dicatat dengan rapi sehingga memudahkan pemantauan setiap siklus budidaya.
            </p>

            <hr class="my-3">

            <p class="text-gray-800" style="line-height: 1.6;">
                FishNote juga menghadirkan fitur <span class="font-weight-bold text-success">Promosi Hasil Budidaya</span>,
                memungkinkan peternak menampilkan produk mereka secara profesional.
                Foto ikan, informasi harga, dan ketersediaan stok bisa diunggah dengan mudah, menjangkau pembeli
                yang lebih luas dan meningkatkan potensi penjualan.
            </p>

            <div class="mt-3 text-center">
                <span class="badge badge-primary p-2 px-3">Pencatatan</span>
                <span class="badge badge-success p-2 px-3">Promosi</span>
                <span class="badge badge-info p-2 px-3">Digitalisasi</span>
            </div>

        </div>
    </div>
</div>

    <!-- info pembuat web fishnote -->
    <div class="col-12 col-md-6 mb-4">
    <div class="card shadow-lg border-0 rounded-lg h-100">
        <div class="card-header py-3 d-flex align-items-center">
            <i class="fas fa-users fa-lg text-primary mr-2"></i>
            <h6 class="m-0 font-weight-bold text-primary">Tim Pengembangan FishNote</h6>
        </div>

        <div class="card-body">

            <p class="text-gray-800 mb-3" style="line-height: 1.6;">
                Website <span class="font-weight-bold text-primary">FishNote</span> dikembangkan oleh tim kecil 
                yang berdedikasi untuk menghadirkan solusi digital bagi dunia budidaya perikanan. 
                Dengan fokus pada kemudahan pencatatan dan efektivitas promosi hasil budidaya, tim berupaya 
                menciptakan platform yang berguna, responsif, dan mudah digunakan oleh seluruh peternak.
            </p>

            <div class="border-left-primary pl-3 mb-3">
                <p class="mb-1 font-weight-bold text-primary">Aidil Ardiansyah</p>
                <p class="text-muted small mb-0">Front-End & System Developer</p>
            </div>

            <div class="border-left-success pl-3 mb-3">
                <p class="mb-1 font-weight-bold text-success">Izzatul Afidah</p>
                <p class="text-muted small mb-0">UI/UX & Documentation Specialist</p>
            </div>

            <div class="border-left-info pl-3">
                <p class="mb-1 font-weight-bold text-info">Yuniarti Mulansari</p>
                <p class="text-muted small mb-0">Data Analyst & Content Support</p>
            </div>

            <div class="mt-4 text-center">
                <span class="badge badge-primary p-2 px-3">Development</span>
                <span class="badge badge-success p-2 px-3">Design</span>
                <span class="badge badge-info p-2 px-3">Innovation</span>
            </div>

        </div>
    </div>
</div>

