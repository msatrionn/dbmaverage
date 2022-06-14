
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Laporan Transaksi</h3>
						<div class="row mt-4 my-4">
							<div class="col-md-6">
							<form action="<?= base_url('transaksi/laporan') ?>" method="get">
								<div class="row">
									<div class="col-md-5">
										<input type="date" class="form-control" name="filter_tgl_awal" id="" required>
									</div>
									<div class="col-md-5">
										<input type="date" class="form-control" name="filter_tgl_akhir" id="" required>
									</div>
									<div class="col-md-2">
										<button class="btn btn-success">Filter</button>
									</div>
								</div>
							</form>
							</div>
						</div>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="tablesdata">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nomor</th>
                                            <th class="border-top-0">Tanggal Transaksi</th>
                                            <th class="border-top-0">Total jumlah</th>
                                            <th class="border-top-0">Total Harga</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=0; ?>
										<?php foreach ($transaksi as $key => $value) {?>
										<?php $no++ ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $value->bulan ?>-<?= $value->tahun ?></td>
												<td><?= $value->jumlah ?></td>
												<td><?= $value->total_harga ?></td>
												<td><a href="<?= base_url('transaksi/laporan_detail/'.$value->tahun."-".date("m", strtotime($value->bulan))) ?>" class="btn btn-primary">Detail</a></td>
											</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 