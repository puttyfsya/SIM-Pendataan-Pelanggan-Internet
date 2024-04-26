<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="justify-content-center">Data Pelanggan Infly</h3>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- <div class="col-6 col-md-4">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Total Pelanggan</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $TotalPelanggan ?> pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Pelanggan Baru -->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Pelanggan Baru</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $JumlahPelangganBaru ?> Pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SURVEY -->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Proses Survey</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $JumlahPelangganSurvey ?> Pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INSTALASI -->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Proses Instalasi</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $JumlahPelangganInstalasi ?> pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NO TERCOVER -->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon pink">
                                            <!-- <img href="<?php echo base_url(); ?>assets/images/wifioff.png"> -->
                                            <i class="iconly-boldActivity"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Tidak Tercover</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $JumlahTidakTercover ?> pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- GRAFIK PELANGGAN chart -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pelanggan Baru</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>