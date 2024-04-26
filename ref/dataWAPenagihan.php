<?php
$months = array(1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
?>

<div id="layoutSidenav_content">
	<main>

		<div class="container-fluid px-4">

			<h1 class="mt-4">Data Customer</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="#">Data Pelanggan Belum Bayar</a></li>
				<li class="breadcrumb-item active">Penagihan Via Whatsapp</li>
			</ol>


			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Data Pelanggan
				</div>
				<div class="card-body">
					<div class="container">

						<?php foreach ($customer as $data) : ?>
						<?php
            if (!function_exists('changeDateFormat')) {
                function changeDateFormat($format='d-m-Y', $givenDate=null)
                {
                    return date($format, strtotime($givenDate));
                }
            }
        ?>
						<form method="POST"
							action="<?php echo base_url('admin/DataPelanggan/DataWAPenagihan/waDataAksi') ?>">
							<div class="row justify-content-center">
								<div class="col-sm-4 mt-2">
									<label for="name" class="form-label" style="font-weight: bold;"> Nama : <span
											class="text-danger">*</span></label>
									<input type="hidden" class="form-control" name="id" id="id"
										value="<?php echo $data->id?>"
										readonly>
									<input type="hidden" class="form-control" name="dayTagihan" id="dayTagihan"
										value="<?php echo changeDateFormat('d', $data->start_date)?>"
										readonly>
									<input type="hidden" class="form-control" name="yearTagihan" id="yearTagihan"
										value="<?php echo date("Y"); ?>"
										readonly>
									<input type="text" class="form-control" name="name" id="name"
										value="<?php echo $data->name?>"
										readonly>
								</div>
								<div class="col-sm-4 mt-2">
									<label for="tagihan" class="form-label" style="font-weight: bold;">Penagihan Bulan:
										<span class="text-danger">*</span></label>
									<input type="text" name="tagihan" id="tagihan" class="form-control" value="<?php
                                          if ($this->session->userdata('bulan') != null) {
                                              echo $months[(int)$this->session->userdata('bulan')];
                                              ;
                                          } else {
                                              echo $months[(int)date('m')];
                                          }?>" readonly>
								</div>
								<div class="col-sm-4 mt-2">
									<label for="code_client" class="form-label" style="font-weight: bold;">Code
										Pelanggan : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="code_client" id="code_client"
										value="<?php echo $data->code_client ?>"
										readonly>
								</div>
							</div>

							<div class="row mt-3 justify-content-center">
								<div class="col-sm-4 mt-2">
									<label for="name_pppoe" class="form-label" style="font-weight: bold;">Nama PPPOE :
										<span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="name_pppoe" id="name_pppoe"
										value="<?php echo $data->name_pppoe?>"
										readonly>
								</div>
								<div class="col-sm-4 mt-2">
									<label for="phone" class="form-label" style="font-weight: bold;">No Telephon : <span
											class="text-danger">*</span></label>
									<input type="text" class="form-control" name="phone" id="phone"
										value="<?php echo $data->phone?>"
										readonly>
								</div>
								<div class="col-sm-4 mt-2">
									<label for="paket" class="form-label" style="font-weight: bold;">Paket : <span
											class="text-danger">*</span></label>
									<input type="hidden" class="form-control" name="namaPaket" id="namaPaket"
										value="<?php echo $data->namaPaket?>"
										readonly>
									<input type="hidden" class="form-control" name="ppn" id="ppn"
										value="Rp. <?php echo number_format($data->hargaPaket*11/100, 0, ',', '.')?>"
										readonly>
									<input type="hidden" class="form-control" name="hargaPaket" id="hargaPaket"
										value="Rp. <?php echo number_format($data->hargaPaket, 0, ',', '.')?>"
										readonly>
									<input type="hidden" class="form-control" name="total" id="total"
										value="<?php echo $data->hargaPaket + $data->hargaPaket*11/100?>"
										readonly>
									<input type="text" class="form-control"
										value="<?php echo $data->namaPaket?> / Rp. <?php echo number_format($data->hargaPaket, 0, ',', '.')?> + PPN"
										readonly>
								</div>
							</div>

							<div class="row mt-3">
								<div class="col-sm-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-success mt-2 justify-content-end"
										style="margin-right: 5px;"><i class="bi bi-whatsapp"></i> Kirim</button>
									<a class="btn btn-danger mt-2 justify-content-end"
										href="<?php echo base_url('admin/DataPelanggan/DataPelangganBelumBayar')?>"><i
											class="bi bi-backspace-fill"></i> Kembali</a>
								</div>
							</div>

						</form>
						<?php endforeach; ?>


					</div>
				</div>
			</div>
		</div>
	</main>