      <footer>
          <br><br><br><br>
          <div class="footer clearfix mb-0 mt-4 text-muted">
              <div class="fotlogin2">
                  <p align="center">2023 &copy; Infly Networks</p>
              </div>
          </div>
      </footer>
      </div>
      </div>
      <!-- <script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
      <!-- <script src="<?php echo base_url(); ?>assets/vendors/apexcharts/apexcharts.js"></script> -->
      <script src="<?php echo base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!-- Scripts Welcome -->
      <script src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>

      <!-- Scripts dataTables-->
      <script src="<?php echo base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>


      <!-- Scripst Jquery -->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

      <!-- Notifikasi Jquery -->
      <script src="<?php echo base_url(); ?>assets/vendors/toastify/toastify.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/extensions/toastify.js"></script>

      <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
      <!-- Scripts Select Pencarian-->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <script>
          // Simple Datatable
          let table1 = document.querySelector('#table1');
          let dataTable = new simpleDatatables.DataTable(table1);
      </script>

      <!-- Button Search  -->
      <script type="text/javascript">
          // Home 20 Button Pencarian
          $('#tlp_pegawai').each(function() {
              $(this).select2({
                  placeholder: 'Pilih Sales :',
                  theme: 'bootstrap-5',
                  dropdownParent: $(this).parent(),
              });
          });

          //   $('#tlp_pegawai').select2({
          //       theme: 'bootstrap-5'
          //   });
      </script>
      </body>

      </html>