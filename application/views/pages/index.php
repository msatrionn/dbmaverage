
           <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Users</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?= $user ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Produk</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?= $bahan ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Transaksi</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?= $transaksi ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Products Yearly Sales
							</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
									<li class="ps-3">
										<form action="<?= base_url('home/filter_chart') ?>" method="get">
											<div class="form-group">
											<div class="row">
											<label for="">Tahun </label>
											<select name="tahun" id="" class="form-control" onchange="this.form.submit()">
												<option value="<?= $thn ?>"><?= $thn ?> Dipilih</option>
												<?php foreach ($transaksi_year as $key => $value) {?>
													<?php if ($value->tahun) { ?>
														<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</div>
											</div>
										</form>
									</li>
                                </ul>
                            </div>
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
			<script src=<?= base_url("assets/plugins/bower_components/jquery/dist/jquery.min.js") ?>></script>
    <!-- Bootstrap tether Core JavaScript -->
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
$(function () {
    "use strict";
    // ============================================================== 
    // Newsletter
    // ============================================================== 

    //ct-visits
    new Chartist.Line('#ct-visits', {
        labels:<?php 
					echo "[";
					foreach ($transaksi_chart  as $key => $value) {
						echo "(".$value->monthnumber.")".",";
					}
					echo "]";
					?>,
        series: [
            <?php 
					echo "[";
					foreach ($transaksi_chart  as $key => $value) {
						echo "(".$value->transaksi.")".",";
					}
					echo "]";
					?>,
        ]
    }, {
        top: 0,
        low: 1,
        showPoint: true,
        fullWidth: true,
        plugins: [
            Chartist.plugins.tooltip()
        ],
        axisY: {
            labelInterpolationFnc: function (value) {
                return (value / 1);
            }
        },
        showArea: true
    });


    var chart = [chart];

    var sparklineLogin = function () {
        $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#7ace4c'
        });
    }
    var sparkResize;
    $(window).on("resize", function (e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin();
});


</script>
