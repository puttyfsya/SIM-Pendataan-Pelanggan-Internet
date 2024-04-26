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

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tabel Pelanggan Instalasi</h3>
                    <p class="text-subtitle text-muted">Data Pelanggan Instalasi</p>
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
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Telephone</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($DataPelangganInstalasi as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_customer'] ?></td>
                                <td><?php echo changeDateFormat('d-m-Y / H:i:s', $data['tanggal']) ?></td>
                                <td><?php echo $data['tlp_customer'] ?></td>
                                <td><?php echo $data['alamat_customer'] ?></td>
                                <td><?php echo $data['paket'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td>
                                    <!-- <a onclick="return confirm('Yakin Menghapus Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('Admin/PelangganInstalasi/DataPelangganInstalasi/deleteData/' . $data['id_customer']) ?>"><i class="bi bi-trash"></i></a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </section>
    </div>