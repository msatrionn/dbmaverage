
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
										<td>
											<?php $no++; ?>
										</td>
										<td><?= $value['bulan'] ?>-<?= $value['tahun'] ?></td>
										<td><?=  $value['jumlah'] ?></td>
										<td><?= $value ['result']?> </td>
										<td><?= $value ['result2']?></td>
										<td><?= $value ['at']?></td>
										<td><?= $value ['bt']?></td>
										<td><?= $value ['ft']?></td>
										<form action="<?= base_url("peramalan/save_ramal") ?>" method="post">
										<input type="hidden" name="bahan[]" value="<?= $bahan_id ?>">
										<input type="hidden" name="jumlah[]" value="<?= $value['jumlah'] ?>">
										<input type="hidden" name="tgl_awal[]" value="<?= $tgl_awal?>">
										<input type="hidden" name="tgl_akhir[]" value="<?= $tgl_akhir?>">
										<input type="hidden" name="tgl[]" value="<?= $value['tahun'] ?>-<?= date("m", strtotime($value["bulan"])) ?>-01">
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
									<td><?= $last_ft?></td>
									</tr>
									<button type="submit" class="btn btn-success">simpan</button>
									</form>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 