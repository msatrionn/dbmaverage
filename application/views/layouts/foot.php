<footer class="footer text-center"> 
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src=<?= base_url("assets/plugins/bower_components/jquery/dist/jquery.min.js") ?>></script>
    <!-- Bootstrap tether Core JavaScript -->
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src=<?= base_url("assets/bootstrap/dist/js/bootstrap.bundle.min.js")?>></script>
    <script src=<?= base_url("assets/js/app-style-switcher.js")?>></script>
    <!--Wave Effects -->
    <script src=<?= base_url("assets/js/waves.js")?>></script>
    <!--Menu sidebar -->
    <script src=<?= base_url("assets/js/sidebarmenu.js")?>></script>
    <!--Custom JavaScript -->
    <script src=<?= base_url("assets/js/custom.js")?>></script>
    <script src="<?= base_url("assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js") ?>"></script>
	<script src="<?= base_url("assets/plugins/bower_components/chartist/dist/chartist.min.js") ?>"></script>
    <script src="<?= base_url("assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js") ?>"></script>
    <!-- <script src="<?= base_url('assets/js/pages/dashboards/dashboard1.js') ?>"></script> -->
	<script>
		$(document).ready(function () {
			$('#tablesdata').DataTable();
		});
	</script>
	

</body>

</html>
