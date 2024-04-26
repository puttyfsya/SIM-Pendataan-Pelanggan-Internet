<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Wilayah Kelurahan</h3>
                    <p class="text-subtitle text-muted">Tabel Data Kelurahan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>DashboardSuperAdmin">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a class="btn buttonmenuatas" href="<?php echo base_url(); ?>SuperAdmin/DataWilayah/DataKelurahan/TambahKelurahan"><i class="bi bi-file-earmark-spreadsheet"></i> Tambah Data</a>
                        </div>
                    </div>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($DataKelurahan as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_kecamatan'] ?></td>
                                <td><?php echo $data['nama_kelurahan'] ?></td>
                                <td>
                                    <a onclick="return confirm('Yakin Menghapus Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('Superadmin/DataWilayah/DataKelurahan/deleteData/' . $data['id_kelurahan']) ?>">
                                        <i class="bi bi-trash"></i></a>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </section>
    </div>