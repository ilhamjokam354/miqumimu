</div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; ADMIN MIQU MIMU <script>document.write(new Date().getFullYear());</script></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Pilih Logout Untuk Keluar.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <?= anchor("auth/logout", '<div class="btn btn-primary" >Logout</div>')?>
      
    </div>
  </div>
</div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/main.js"></script>
   <!-- Page level plugins -->
   <script src="<?= base_url()?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>