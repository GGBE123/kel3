<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center mt-5">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <!-- Judul halaman -->
                        <p class="m-b-0">Dashboard Admin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <!-- Breadcrumb untuk halaman utama -->
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- Tampilan kolom untuk masing-masing informasi -->
                        <!-- Kolom pertama -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Nilai dinamis untuk Waiting List -->
                                            <h4 class="text-c-purple"><?= isset($countProses) ? $countProses : '0'; ?></h4>
                                            <h6 class="text-muted m-b-0">Waiting List</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <!-- Ikona grafik -->
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kolom kedua -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Nilai dinamis untuk Being Reviewed -->
                                            <h4 class="text-c-green"><?= isset($countReview) ? $countReview : '0'; ?></h4>
                                            <h6 class="text-muted m-b-0">Being Reviewed</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <!-- Ikona grafik -->
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kolom ketiga -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Nilai dinamis untuk Processed by PERPUSNAS -->
                                            <h4 class="text-c-red"><?= isset($countDiajukanIsbn) ? $countDiajukanIsbn : '0'; ?></h4>
                                            <h6 class="text-muted m-b-0">Processed by PERPUSNAS</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <!-- Ikona grafik -->
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kolom keempat -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Nilai dinamis untuk Accepted -->
                                            <h4 class="text-c-blue"><?= isset($countDiterima) ? $countDiterima : '0'; ?></h4>
                                            <h6 class="text-muted m-b-0">Accepted</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <!-- Ikona grafik -->
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kolom kelima -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <!-- Nilai dinamis untuk Denied -->
                                            <h4 class="text-c-blue"><?= isset($countDitolak) ? $countDitolak : '0'; ?></h4>
                                            <h6 class="text-muted m-b-0">Denied</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <!-- Ikona grafik -->
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <!-- Selector style -->
            <div id="styleSelector"> </div>
        </div>
    </div>
    <!-- Main-body end -->
</div>
