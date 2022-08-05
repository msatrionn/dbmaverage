
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Data Peramalan</h3>
                            <div class="table-responsive mt-4">
                                <table class="table text-nowrap" id="tablesdata">
								<tr>
									<th>No</th>
									<th>BULAN</th>
									<th>PERMINTAAN</th>
									<th>MA 3 BULAN</th>
									<th>DOUBLE MOVING AVERAGE</th>
									<th>NILAI AT</th>
									<th>NILAI BT</th>
									<th>NILAI FT</th>
								</tr>
								<?php $no=1; ?>
								<?php foreach ($data as $key => $value) {?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= date_format(date_create($value['bulan']),"M-Y") ?></td>
										<td><?= $value['jumlah'] ?></td>
										<td><?= round($value ['result'])?> </td>
										<td><?= round($value ['result2'])?></td>
										<td><?= round($value ['at'])?></td>
										<td><?= round($value ['bt'])?></td>
										<td><?= round($value ['ft'])?><?= $satuan ?></td>
									</tr>
									<?php } ?>
									<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><?= $last_ft?><?= $satuan ?></td>
									</tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 