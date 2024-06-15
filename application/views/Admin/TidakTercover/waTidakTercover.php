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
                    <h3>Follow Up Data Pelanggan Not Covered</h3>
                    <p class="text-subtitle text-muted">Follow up Pelanggan Not Covered</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard1">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tidak Tercover</li>
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
                                <?php foreach ($Follow as $data) : ?>
                                    <form method="POST" action="<?php echo base_url('Admin/TidakTercover/WaTidakTercover/followUpSales') ?>">
                                        <div class="row">

                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" id="name-column" class="form-control" name="nama_customer" value="<?php echo $data->nama_customer ?>" readonly>
                                                    <input type="hidden" class="form-control" name="id_customer" id="id" value="<?php echo $data->id_customer ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="telephone-column">NIK</label>
                                                    <input type="text" id="telephone-column" class="form-control" name="nik_customer" value="<?php echo $data->nik_customer ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="telephone-column">Telephone</label>
                                                    <input type="text" id="telephone-column" class="form-control" name="tlp_customer" value="<?php echo $data->tlp_customer ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <fieldset class="form-group">
                                                    <label for="helpInputTop">Paket</label>
                                                    <select class="form-select" name="paket" id="paket" disabled>
                                                        <option disabled>-- Pilih Paket --</option>
                                                        <option value="1" <?php if ($data->paket == '1') echo 'selected'; ?>>Home 10 Mbps - 160.000</option>
                                                        <option value="2" <?php if ($data->paket == '2') echo 'selected'; ?>>Home 20 Mbps - 200.000</option>
                                                        <option value="3" <?php if ($data->paket == '3') echo 'selected'; ?>>Home 30 Mbps - 250.000</option>
                                                        <option value="4" <?php if ($data->paket == '4') echo 'selected'; ?>>Home 50 Mbps - 320.000</option>
                                                        <option value="5" <?php if ($data->paket == '5') echo 'selected'; ?>>Home 100 Mbps - 499.000</option>
                                                    </select>

                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="tanggal-column">Tanggal</label>
                                                    <input type="text" id="tanggal-column" class="form-control" name="tanggal-column" value="<?php echo $data->tanggal ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="status-column">Status</label>
                                                    <input type="status" id="status-column" class="form-control" name="status-id-column" value="<?php echo $data->status ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <fieldset class="form-group">
                                                        <label for="helpInputTop">Kota</label>
                                                        <select class="form-select" name="id_kota" id="id_kota" disabled>
                                                            <option disabled selected>-- Pilih Kota --</option>
                                                            <?php foreach ($kota as $k) : ?>
                                                                <option value="<?php echo $k['id_kota']; ?>" <?= $data->id_kota == $k['id_kota'] ? 'selected' : null ?>>
                                                                    <?php echo $k['nama_kota']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="bg-danger mt-1">
                                                            <small class="text-white"><?php echo form_error('id_kota') ?></small>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <fieldset class="form-group">
                                                        <label for="helpInputTop">Kecamatan</label>
                                                        <select class="form-select" name="id_kecamatan" id="id_kecamatan" disabled>
                                                            <option disabled selected>-- Pilih Kecamatan --</option>
                                                            <?php foreach ($kecamatan as $kec) : ?>
                                                                <option value="<?php echo $kec['id_kecamatan']; ?>" data-kota="<?= $kec['id_kota']; ?>" <?= $data->id_kecamatan == $kec['id_kecamatan'] ? 'selected' : null ?>>
                                                                    <?php echo $kec['nama_kecamatan']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="bg-danger mt-1">
                                                            <small class="text-white"><?php echo form_error('id_kecamatan') ?></small>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4">
                                                    <fieldset class="form-group">
                                                        <label for="helpInputTop">Kelurahan</label>
                                                        <select class="form-select" name="id_kelurahan" id="id_kelurahan" disabled>
                                                            <option disabled selected>-- Pilih Kelurahan --</option>
                                                            <?php foreach ($kelurahan as $kel) : ?>
                                                                <option value="<?php echo $kel['id_kelurahan']; ?>" data-kecamatan="<?= $kel['id_kecamatan']; ?>" <?= $data->id_kelurahan == $kel['id_kelurahan'] ? 'selected' : null ?>>
                                                                    <?php echo $kel['nama_kelurahan']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="bg-danger mt-1">
                                                            <small class="text-white"><?php echo form_error('id_kelurahan') ?></small>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Alamat</label>
                                                    <input type="text" id="alamat" class="form-control" name="alamat_customer" value="<?php echo $data->alamat_customer ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="sales-column">Sales</label>
                                                    <select id="tlp_pegawai" name="tlp_pegawai" class="form-select form-select-pendaftaran" required>
                                                        <option value="" disabled required selected></option>
                                                        <?php foreach ($DataPegawai as $data) { ?>
                                                            <option value="<?php echo $data['tlp_pegawai']; ?>"><?php echo $data['nama_pegawai']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
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