  <!-- Vendor JS Files -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>

  <!-- <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/grafpilih/isotope.pkgd.min.js"></script>


  <script>
    $(document).ready(function() {
      $('#tabel1').DataTable();
    });
  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

  <!-- 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script> -->
  <!-- Include fusioncharts core library -->
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <!-- Include fusion theme -->
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>

  <!-- Template Main JS File -->


  <!-- SCRIPTS -->
  <?= $this->renderSection('script') ?>

  <script>
    function toggleMenu() {
      var menuItems = document.getElementsByClassName('menu-item');
      for (var i = 0; i < menuItems.length; i++) {
        var menuItem = menuItems[i];
        menuItem.classList.toggle("hidden");
      }
    }
  </script>

  <script src="/assets/js/popper.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/appear.min.js"></script>
  <script src="/assets/js/odometer.min.js"></script>
  <script src="/assets/js/magnific-popup.min.js"></script>
  <script src="/assets/js/fancybox.min.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/meanmenu.min.js"></script>
  <script src="/assets/js/nice-select.min.js"></script>
  <script src="/assets/js/sticky-sidebar.min.js"></script>
  <script src="/assets/js/wow.min.js"></script>
  <script src="/assets/js/ajaxchimp.min.js"></script>
  <script src="/assets/js/glightbox.min.js"></script>
  <script src="/assets/js/isotope.pkgd.min.js"></script>
  <script src="/assets/js/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->

  <script src="/assets/js/style.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- <script src="/assets/vendor/bootstrap/datatable/jquery.dataTables.min.js"></script>
  <script src="/assets/vendor/bootstrap/datatable/jquery-3.5.1.js"></script>
  <script src="/assets/vendor/bootstrap/datatable/dataTables.bootstrap5.min.js"></script> -->
  <script>
    $(document).ready(function() {
      $('#listbod').DataTable();
    });
  </script>