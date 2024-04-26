<?php
$months = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');

if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $givenDate = null)
    {
        return date($format, strtotime($givenDate));
    }
}
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <!-- <style>
        .status-pelanggan {
            text-align: center;
        }
    </style> -->

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
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a class="btn buttonmenuatas mr-5 ml-5" href="<?php echo base_url(); ?>Admin/PelangganBaru/TambahPelangganBaru"><i class="bi bi-file-earmark-spreadsheet"></i> Tambah Data</a>
                            <a class="btn buttonmenuatas mr-5 ml-5" href="<?php echo base_url(); ?>Admin/PelangganBaru/excel_export/export"><i class="bi bi-save"></i> Export Data</a>
                        </div>
                    </div>
                    <table class="table table-striped" id="table1" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Telephone</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($DataPelangganBaru as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_customer'] ?></td>
                                <td><?php echo $data['paket'] ?></td>
                                <td><?php echo $data['tlp_customer'] ?></td>
                                <td><?php echo $data['alamat_customer'] ?></td>
                                <td><?php echo changeDateFormat('d-m-Y / H:i:s', $data['tanggal']) ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-warning dropdown-toggle" type=" button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class=" bi bi-pencil-square"></i></a>
                                        <ul class="col-12 dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a onclick="return confirm('Yakin Mengedit Data?')" class="dropdown-item" href="<?php echo base_url('Admin/PelangganBaru/EditDataPelangganBaru/editData/' . $data['id_customer']) ?>">Edit</a></li>
                                            <li><a onclick="return confirm('Yakin Menghapus Data')" class="dropdown-item" href="<?php echo base_url('Admin/PelangganSurvey/DataPelangganSurvey/deleteData/' . $data['id_customer']) ?>">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
                            <?php } ?>
                    </table>
                </div>
            </div>

        </section>
    </div>