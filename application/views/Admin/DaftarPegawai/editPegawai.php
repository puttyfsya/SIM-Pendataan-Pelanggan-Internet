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
                    <h3>Tabel Pelanggan Baru</h3>
                    <p class="text-subtitle text-muted">Data Pelanggan Baru</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard1">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggan Baru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <?php foreach ($DataPegawai as $data) : ?>
                                    <form method="POST" action="<?php echo base_url('PegawaiData/EditPegawai/editDataAksi') ?>">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="helpInputTop">Nama</label>
                                                    <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai" value="<?php echo $data->id_pegawai ?>" readonly>
                                                    <input type="text" name="nama_pegawai" value="<?php echo $data->nama_pegawai ?>" class="form-control" id="nama_pegawai">
                                                    <div class="bg-danger mt-1">
                                                        <small class="text-white"><?php echo form_error('nama_pegawai') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="helpInputTop">NIK</label>
                                                    <input type="text" value="<?php echo $data->nik_pegawai ?>" name="nik_pegawai" class="form-control" id="nik_pegawai">
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
                                                    <input type="text" value="<?php echo $data->tlp_pegawai ?>" name="tlp_pegawai" id="tlp" class="form-control" placeholder="">
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
                                                        <?php foreach ($DataJabatan as $dataJb) : ?>
                                                            <option value="<?php echo $dataJb['id_jabatan']; ?>" <?= $data->id_jabatan == $dataJb['id_jabatan'] ? 'selected' : null ?>>
                                                                <?php echo $dataJb['nama_jabatan']; ?>
                                                            </option>
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
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>