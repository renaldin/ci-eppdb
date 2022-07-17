</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="container">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">SDN Cibogo</a>.</strong> All rights
    reserved.
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>

<script src="<?= base_url() ?>/template-landing/lib/wow/wow.min.js"></script>
<script src="<?= base_url() ?>/template-landing/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>/template-landing/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>/template-landing/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/template-landing/lib/isotope/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/template-landing/lib/lightbox/js/lightbox.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url() ?>/template-landing/js/main.js"></script>

<!-- page script -->
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(1500, function() {
      $(this).remove();
    });
  }, 10000);
</script>

<script>
  function bacaGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#preview_gambar').change(function() {
    bacaGambar(this);
  })
</script>

</body>

</html>