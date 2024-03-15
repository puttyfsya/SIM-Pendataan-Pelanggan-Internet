<!-- <div id="main">
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

                    <form method="POST" action="<?php echo base_url('PegawaiData/TambahPegawai/TambahDataAksi') ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Nama</label>
                                    <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('nama_pegawai') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">NIK</label>
                                    <input type="text" name="nik_pegawai" class="form-control" id="nik_pegawai">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('nik_pegawai') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helperText">Telephone</label>
                                    <input type="text" name="tlp_pegawai" id="tlp" class="form-control" placeholder="">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('tlp_pegawai') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="helpInputTop">Jabatan</label>
                                    <select class="form-select" name="id_jabatan" id="id_jabatan">
                                        <option disabled selected>-- Pilih Jabatan --</option>
                                        <?php foreach ($DataJabatan as $data) : ?>
                                            <option value="<?php echo $data['id_jabatan']; ?>">
                                                <?php echo $data['nama_jabatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('id_jabatan') ?></small>
                                    </div>
                                </fieldset>
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
</div> -->