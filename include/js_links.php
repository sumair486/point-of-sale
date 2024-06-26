 <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/datatable/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
 
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="assets/plugins/inputmask/inputmask.min.js"></script>
  <script src="assets/plugins/popper.js/popper.min.js"></script>
  <script src="assets/plugins/select2/js/select2.min.js"></script>
  
  <script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
 <script src="assets/plugins/font-awesome/js/font-awesome.min.js"></script>
  <script src="../../assets/pdf/pdfmake.min.js"></script>
  <script src="../../assets/pdf/vfs_fonts.js"></script>
  <script src="../../assets/pdf/jszip.min.js"></script>
  
  <!--app JS-->
  <script src="assets/js/app.js"></script>

  <!-- Initilize -->
<script type="text/javascript">
$(function () {
    $('.select2').select2({
      
      theme: 'bootstrap4'
    });
    $('.datatable').DataTable();
    
    $(":input").inputmask();

    
});