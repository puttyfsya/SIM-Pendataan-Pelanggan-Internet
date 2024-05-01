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
                    <h3>Tabel Survey Pelanggan</h3>
                    <p class="text-subtitle text-muted">Data Pelanggan Survey</p>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $paketMap = [
                            '1' => 'Home 10 Mbps - 160.000',
                            '2' => 'Home 20 Mbps - 200.000',
                            '3' => 'Home 30 Mbps - 250.000',
                            '4' => 'Home 50 Mbps - 320.000',
                            '5' => 'Home 100 Mbps - 499.000',
                        ];
                        $no = 1;
                        foreach ($DataPelangganSurvey as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['nama_customer'] ?></td>
                                <td><?php echo isset($paketMap[$data['paket']]) ? $paketMap[$data['paket']] : 'Tidak Diketahui' ?></td>
                                <td><?php echo $data['tlp_customer'] ?></td>
                                <td><?php echo $data['alamat_customer'] ?></td>
                                <td><?php echo changeDateFormat('d-m-Y / H:i:s', $data['tanggal']) ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-warning dropdown-toggle" type=" button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class=" bi bi-pencil-square"></i></a>
                                        <ul class="col-12 dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a onclick="" class="dropdown-item" href="<?php echo base_url('Superadmin/PelangganSurvey/EditPelangganSurvey/editData/' . $data['id_customer']) ?>">ACC Instalasi</a></li>
                                            <li><a onclick="return confirm('Yakin Merubah Data')" class="dropdown-item" href="<?php echo base_url('Superadmin/PelangganSurvey/EditPelangganSurvey/dataTolak/' . $data['id_customer']) ?>">Tidak Tercover</a></li>
                                            <!-- <li><a onclick="return confirm('Yakin Menghapus Data')" class="dropdown-item" href="<?php echo base_url('Superadmin/PelangganSurvey/DataPelangganSurvey/deleteData/' . $data['id_customer']) ?>">Hapus</a></li> -->
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </section>
    </div>