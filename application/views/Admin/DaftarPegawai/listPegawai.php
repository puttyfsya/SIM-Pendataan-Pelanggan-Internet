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
                    <h3>Employee Data of Infly Networks</h3>
                    <p class="text-subtitle text-muted">Tabel Data Sales</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard1">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="row">
                        <div class="col-12">
                            <a class="btn buttonmenuatas" href="<?php echo base_url(); ?>PegawaiData/TambahPegawai"><i class="bi bi-file-earmark-spreadsheet"></i> Tambah Data</a>
                        </div>
                    </div> -->
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Telephone</th>
                                <th>Jabatan</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($DataPegawaiInfly as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_pegawai'] ?></td>
                                <td><?php echo $data['nik_pegawai'] ?></td>
                                <td><?php echo $data['tlp_pegawai'] ?></td>
                                <td><?php echo $data['nama_jabatan'] ?></td>
                                <!-- <td>
                                    <a onclick="return confirm('Yakin Mengedit Data')" class="btn btn-sm btn-warning" href="<?php echo base_url('PegawaiData/EditPegawai/editData/' . $data['id_pegawai']) ?>">
                                        <i class="bi bi-pencil-square"></i></a>

                                    <a onclick="return confirm('Yakin Menghapus Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('PegawaiData/DataPegawaiInfly/deleteData/' . $data['id_pegawai']) ?>">
                                        <i class="bi bi-trash"></i></a>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </section>
    </div>