
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Laporan Transaksi</h3>
						<div class="row mt-4 my-4">
							<div class="col-md-6">
							<form action="<?= base_url('transaksi/laporan_detail/'.$tgl) ?>" method="get">
								<div class="row">
									<div class="col-md-5">
										<input type="hidden" name="tgl" value="<?php  ?>"> 
										<select name="nama_bahan" id="" class="form-control">
											<option value="all">Semua</option>
											<?php foreach ($bahan as $key => $val) {?>
												<option value="<?= $val->id_bahan ?>"><?= $val->nama_bahan ?></option>
											<?php } ?>
										</select>
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
                                            <th class="border-top-0">Nama Bahan</th>
                                            <th class="border-top-0">Total jumlah</th>
                                            <th class="border-top-0">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=0; ?>
										<?php foreach ($transaksi as $key => $value) {?>
										<?php $no++ ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= date_format(date_create($value->tanggal_transaksi),"d-M-Y")?></td>
												<td><?= $value->nama_bahan ?></td>
												<td><?= $value->jumlah ?></td>
												<td><?= $value->total_harga ?></td>
											</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 