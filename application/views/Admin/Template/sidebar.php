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
                            <a href="<?php echo base_url(); ?>DashboardAdmin" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!--Data Pelanggan-->
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Pelanggan</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>Admin/PelangganBaru/DataPelangganBaru" class='sidebar-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                        <span>Pelanggan Baru</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>Admin/PelangganSurvey/DataPelangganSurvey" class='sidebar-link'>
                                        <i class="bi bi-binoculars-fill"></i>
                                        <span>Survey</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>Admin/PelangganInstalasi/DataPelangganInstalasi" class='sidebar-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <span>Instalasi</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?php echo base_url(); ?>Admin/TidakTercover/DataTidakTercover" class='sidebar-link'>
                                        <i class="bi bi-wifi-off"></i>
                                        <span>Tidak Tercover</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-title">Data Sales</li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url(); ?>Admin/PegawaiData/DataPegawaiInfly" class='sidebar-link'>
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Data Pegawai</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('Welcome/logout'); ?>" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>