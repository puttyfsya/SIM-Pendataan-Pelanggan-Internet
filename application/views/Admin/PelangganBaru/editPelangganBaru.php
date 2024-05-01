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
                                <?php foreach ($DataPelangganEdit as $data) : ?>
                                    <form method="POST" action="<?php echo base_url('Admin/PelangganBaru/EditDataPelangganBaru/editDataAksi') ?>">
                                        <div class="row">
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" id="name-column" class="form-control" name="nama_customer" value="<?php echo $data->nama_customer ?>">
                                                    <input type="hidden" class="form-control" name="id_customer" id="id" value="<?php echo $data->id_customer ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="telephone-column">NIK</label>
                                                    <input type="text" id="telephone-column" class="form-control" name="nik_customer" value="<?php echo $data->nik_customer ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="telephone-column">Telephone</label>
                                                    <input type="text" id="telephone-column" class="form-control" name="tlp_customer" value="<?php echo $data->tlp_customer ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <fieldset class="form-group">
                                                    <label for="helpInputTop">Paket</label>
                                                    <select class="form-select" name="paket" id="paket">
                                                        <option disabled>-- Pilih Paket --</option>
                                                        <option value="1" <?php if ($data->paket == '1') echo 'selected'; ?>>Home 10 Mbps - 160.000</option>
                                                        <option value="2" <?php if ($data->paket == '2') echo 'selected'; ?>>Home 20 Mbps - 200.000</option>
                                                        <option value="3" <?php if ($data->paket == '3') echo 'selected'; ?>>Home 30 Mbps - 250.000</option>
                                                        <option value="4" <?php if ($data->paket == '4') echo 'selected'; ?>>Home 50 Mbps - 320.000</option>
                                                        <option value="5" <?php if ($data->paket == '5') echo 'selected'; ?>>Home 100 Mbps - 499.000</option>
                                                    </select>
                                                    <!-- <div id="info-paket" class="bg-info mt-2 px-2 py-1 rounded" style="display: none;"></div> -->
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="name">Tanggal</label>
                                                    <input type="date" id="tanggal-column" class="form-control" name="tanggal-column" value="<?php echo $data->tanggal ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="status-column">Status</label>
                                                    <input type="status" id="status-column" class="form-control" name="status-id-column" value="<?php echo $data->status ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="helpInputTop">Alamat</label>
                                                    <input type="text" name="alamat_customer" class="form-control" id="alamat_customer" value="<?php echo $data->alamat_customer ?>">
                                                    <div class="bg-danger mt-1">
                                                        <small class="text-white"><?php echo form_error('alamat_customer') ?></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="helpInputTop">Kota</label>
                                                        <select class="form-select" name="id_kota" id="id_kota">
                                                            <option disabled>-- Nama Kota --</option>
                                                            <?php foreach ($DataKota as $dataKota) : ?>
                                                                <option value="<?php echo $dataKota['id_kota']; ?>" <?php if ($dataKota['id_kota'] == $data->id_kota) echo 'selected'; ?>>
                                                                    <?php echo $dataKota['nama_kota']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="helpInputTop">Kecamatan</label>
                                                        <select class="form-select" name="id_kecamatan" id="id_kecamatan">
                                                            <option disabled>-- Nama Kecamatan --</option>
                                                            <?php foreach ($DataWilayah as $dataWilayah) : ?>
                                                                <option value="<?php echo $dataWilayah['id_kecamatan']; ?>" <?php if ($dataWilayah['id_kecamatan'] == $data->id_kecamatan) echo 'selected'; ?>>
                                                                    <?php echo $dataWilayah['nama_kecamatan']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="helpInputTop">Kelurahan</label>
                                                        <select class="form-select" name="id_kelurahan" id="id_kelurahan">
                                                            <option disabled>-- Nama Kelurahan --</option>
                                                            <?php foreach ($DataWilayah as $dataWilayah) : ?>
                                                                <option value="<?php echo $dataWilayah['id_kelurahan']; ?>" <?php if ($dataWilayah['id_kelurahan'] == $data->id_kelurahan) echo 'selected'; ?>>
                                                                    <?php echo $dataWilayah['nama_kelurahan']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
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
</div>