<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infly Pelanggan</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/logo/infly.png" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Boostrap 5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    <!-- Icon Dashboard CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconly/bold.css">

    <!-- Css Datatables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/simple-datatables/style.css">

    <!-- Icon Sidebar -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style2.css">

    <!-- Notifikasi -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/toastify/toastify.css" />

    <!--CSS Select Pencarian -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <!-- CSS Font -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">

    <script>
        $(document).ready(function() {
            $('#id_kota').change(function() {
                var id_kota = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/PelangganBaru/TambahPelangganBaru/get_kecamatan_by_kota'); ?>",
                    data: {
                        id_kota: id_kota
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#id_kecamatan').html('');
                        $.each(data, function(key, value) {
                            $('#id_kecamatan').append('<option value="' + value.id_kecamatan + '">' + value.nama_kecamatan + '</option>');
                        });
                    }
                });
            });

            $('#id_kecamatan').change(function() {
                var id_kecamatan = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/PelangganBaru/TambahPelangganBaru/get_kelurahan_by_kecamatan'); ?>",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#id_kelurahan').html('');
                        $.each(data, function(key, value) {
                            $('#id_kelurahan').append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan + '</option>');
                        });
                    }
                });
            });
        });
    </script>



</head>