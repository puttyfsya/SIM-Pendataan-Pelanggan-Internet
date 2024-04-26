<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <img src="<?php echo base_url(); ?>assets/images/logo/inflylogo.png"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>DashboardSuperAdmin" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!--Data Pelanggan-->
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Customer Data</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/PelangganBaru/DataPelangganBaru" class='sidebar-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                        <span>New Customer</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/PelangganSurvey/DataPelangganSurvey" class='sidebar-link'>
                                        <i class="bi bi-binoculars-fill"></i>
                                        <span>Survey</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/PelangganInstalasi/DataPelangganInstalasi" class='sidebar-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <span>Installation</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/TidakTercover/DataTidakTercover" class='sidebar-link'>
                                        <i class="bi bi-wifi-off"></i>
                                        <span>Not Covered</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-title">Data Sales</li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>SuperAdmin/PegawaiData/DataPegawaiInfly" class='sidebar-link'>
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Employee Data</span>
                            </a>
                        </li>

                        <!--Data Wilayah-->
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Data Wilayah</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/DataWilayah/DataKota" class='sidebar-link'>
                                        <i class="bi bi-globe"></i>
                                        <span>Kota</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/DataWilayah/DataKecamatan" class='sidebar-link'>
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>Kecamatan</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>SuperAdmin/DataWilayah/DataKelurahan" class='sidebar-link'>
                                        <i class="bi bi-geo-fill"></i>
                                        <span>Kelurahan</span>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="sidebar-title">Logout</li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('Welcome/logout'); ?>" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>