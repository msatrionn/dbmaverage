
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Data Transaksi</h3>
							<a href="<?= base_url('transaksi/create') ?>" class="btn btn-success">Tambah Transaksi</a>
                            <div class="table-responsive  mt-4">
                                <table class="table text-nowrap" id="tablesdata">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nomor</th>
                                            <th class="border-top-0">Nama Bahan</th>
                                            <th class="border-top-0">Karyawan Input</th>
                                            <th class="border-top-0">Total jumlah</th>
                                            <th class="border-top-0">Total Harga</th>
                                            <th class="border-top-0">Tanggal Transaksi</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=0; ?>
										<?php foreach ($transaksi as $key => $value) {?>
										<?php $no++ ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $value->nama_bahan ?></td>
												<td><?= $value->nama_karyawan ?></td>
												<td><?= $value->jumlah ?></td>
												<td><?= $value->total_harga ?></td>
												<td><?= date_format(date_create($value->tanggal_transaksi),"d-M-Y") ?></td>
												<td>
													<div class="d-flex">
														<a href="<?= base_url('transaksi/edit/'.$value->id_transaksi) ?>" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
														<a href="<?= base_url('transaksi/delete/'.$value->id_transaksi) ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-danger">Delete</a>
													</div>
												</td>
											</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 