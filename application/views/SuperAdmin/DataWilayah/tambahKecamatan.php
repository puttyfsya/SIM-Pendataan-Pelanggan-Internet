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
                    <h3>Data Wilayah Kecamatan</h3>
                    <p class="text-subtitle text-muted">Tambah Data Kecamatan</p>
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

                    <form method="POST" action="<?php echo base_url('SuperAdmin/DataWilayah/DataKecamatan/TambahKecamatan') ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kota-column">Nama Kota</label>
                                    <select id="id_kota" name="id_kota" class="form-select form-select-pendaftaran" required>
                                        <option value="" disabled required selected></option>
                                        <?php foreach ($DataKota as $data) { ?>
                                            <option value="<?php echo $data['id_kota']; ?>"><?php echo $data['nama_kota']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Nama Kecamatan</label>
                                    <input type="text" name="nama_kecamatan" class="form-control" id="nama_kecamatan">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('nama_kecamatan') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-5 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" href="#">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
</div>