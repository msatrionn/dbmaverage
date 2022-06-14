
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Data Peramalan</h3>
							<form action="<?= base_url('peramalan/ramal') ?>" method="get">
							Ramal
								<div class="row col-md-6">
									<div class="col-md-3">
										<input type="date" class="form-control" name="tgl_awal" id="" required>
									</div>
									<div class="col-md-3">
										<input type="date" class="form-control" name="tgl_akhir" id="" required>
									</div>
										<div class="col-md-3">
											<select name="bahan" id="" class="form-control">
												<?php foreach ($bahan as $key => $val) {?>
													<option value="<?= $val->id_bahan ?>"><?= $val->nama_bahan ?></option>
												<?php } ?>
											</select>
										</div>
									<div class="col-md-2">
										<button class="btn btn-success">Ramal</button>
									</div>
								</div>
							</form>
                            <div class="table-responsive mt-4">
                                <table class="table text-nowrap" id="tablesdata">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nomor</th>
                                            <th class="border-top-0">Tanggal Transaksi</th>
                                            <th class="border-top-0">Nama Bahan</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=0; ?>
										<?php foreach ($peramalan as $key => $value) {?>
										<?php $no++ ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $value->waktu_peramalan ?></td>
												<td><?= $value->nama_bahan ?></td>
												<td><a href="<?= base_url('peramalan/ramal_detail/'.$value->index_ramal) ?>">Detail peramalan</a></td>
											</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 