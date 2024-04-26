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
                                                    <label for="telephone-column">Telephone</label>
                                                    <input type="text" id="telephone-column" class="form-control" name="tlp_customer" value="<?php echo $data->tlp_customer ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="tanggal-column">Tanggal</label>
                                                    <input type="text" id="tanggal-column" class="form-control" name="tanggal-column" value="<?php echo $data->tanggal ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Alamat</label>
                                                    <input type="text" id="alamat" class="form-control" name="alamat_customer" value="<?php echo $data->alamat_customer ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3 col-12">
                                                <fieldset class="form-group">
                                                    <label for="helpInputTop">Paket</label>
                                                    <!-- <input type="text" > -->
                                                    <select class="form-select" value="<?php echo $data->paket ?>" name="paket" id="paket">
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
                                                <!-- <div class="form-group">
                                                    <label for="paket-column">Paket</label>
                                                    <input type="text" id="paket-column" class="form-control" name="paket" value="<?php echo $data->paket ?>">
                                                </div> -->
                                            </div>
                                            <div class="col-md-4 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="status-column">Status</label>
                                                    <input type="status" id="status-column" class="form-control" name="status-id-column" value="<?php echo $data->status ?>">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4 mt-3 col-12">
                                                <div class="form-group">
                                                    <label for="sales-column">Sales</label>
                                                    <select id="tlp_pegawai" name="tlp_pegawai" class="form-select form-select-pendaftaran" required>
                                                        <option value="" disabled required selected></option>
                                                        <?php foreach ($DataPegawai as $data) { ?>
                                                            <option value="<?php echo $data['tlp_pegawai']; ?>"><?php echo $data['nama_pegawai']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div> -->
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