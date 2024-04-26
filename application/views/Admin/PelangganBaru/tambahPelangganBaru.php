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
                    <h3>Customer Data of Infly Networks</h3>
                    <p class="text-subtitle text-muted">Form Pelanggan Baru</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>DashboardAdmin">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataForm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="<?php echo base_url('Admin/PelangganBaru/TambahPelangganBaru/TambahDataAksi') ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Nama</label>
                                    <input type="text" name="nama_customer" class="form-control" id="nama_customer">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('nama_customer') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">NIK</label>
                                    <input type="text" name="nik_customer" class="form-control" id="nik_customer">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('nik_customer') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helperText">Telephone</label>
                                    <input type="text" name="tlp_customer" id="tlp" class="form-control" placeholder="">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('tlp_customer') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="helpInputTop">Paket</label>
                                    <select class="form-select" name="paket" id="paket">
                                        <option disabled selected>-- Pilih Paket --</option>
                                        <option value="1">Home 10 Mbps - 160.000</option>
                                        <option value="2">Home 20 Mbps - 200.000</option>
                                        <option value="3">Home 30 Mbps - 250.000</option>
                                        <option value="4">Home 50 Mbps - 320.000</option>
                                        <option value="5">Home 100 Mbps - 499.000</option>
                                    </select>
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('id_jabatan') ?></small>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Alamat</label>
                                    <input type="text" name="alamat_customer" class="form-control" id="alamat_customer">
                                    <div class="bg-danger mt-1">
                                        <small class="text-white"><?php echo form_error('alamat_customer') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="helpInputTop">Nama Pegawai</label>
                                    <select class="form-select" name="nama_pegawai" id="nama_pegawai">
                                        <option disabled selected>-- Nama Pegawai --</option>
                                        <?php foreach ($DataPegawai as $data) : ?>
                                            <option value="<?php echo $data['nama_pegawai']; ?>">
                                                <?php echo $data['nama_pegawai']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="helpInputTop">Kota</label>
                                    <select class="form-select" name="id_kota" id="id_kota">
                                        <option disabled selected>-- Nama Kota --</option>
                                        <?php foreach ($DataKota as $dataKota) : ?>
                                            <option value="<?php echo $dataKota['id_kota']; ?>">
                                                <?php echo $dataKota['nama_kota']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="helpInputTop">Kecamatan</label>
                                    <select class="form-select" name="id_kecamatan" id="id_kecamatan">
                                        <option disabled selected>-- Nama Kecamatan --</option>
                                        <?php foreach ($DataWilayah as $dataKelurahan) : ?>
                                            <option value="<?php echo $dataKelurahan['id_kecamatan']; ?>">
                                                <?php echo $dataKelurahan['nama_kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="helpInputTop">Kelurahan</label>
                                    <select class="form-select" name="id_kelurahan" id="id_kelurahan">
                                        <option disabled selected>-- Nama Kelurahan --</option>
                                        <?php foreach ($DataWilayah as $dataKelurahan) : ?>
                                            <option value="<?php echo $dataKelurahan['id_kelurahan']; ?>">
                                                <?php echo $dataKelurahan['nama_kelurahan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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