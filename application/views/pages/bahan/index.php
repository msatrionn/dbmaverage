
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Data Bahan</h3>
							<a href="<?= base_url('bahan/create') ?>" class="btn btn-success">Tambah Bahan</a>
                            <div class="table-responsive  mt-4">
                                <table class="table text-nowrap" id="tablesdata">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nomor</th>
                                            <th class="border-top-0">Nama Bahan</th>
                                            <th class="border-top-0">Satuan</th>
                                            <th class="border-top-0">Harga</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=0; ?>
										<?php foreach ($bahan as $key => $value) {?>
										<?php $no++ ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $value->nama_bahan ?></td>
												<td><?= $value->satuan ?></td>
												<td><?= "Rp " . number_format($value->harga_bahan,2,',','.') ?></td>
												<td>
													<div class="d-flex">
														<a href="<?= base_url('bahan/edit/'.$value->id_bahan) ?>" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
														<a href="<?= base_url('bahan/delete/'.$value->id_bahan) ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-danger">Delete</a>
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
 