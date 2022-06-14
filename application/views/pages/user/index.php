
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">Data User</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="tablesdata">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nomor</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Nama Karyawan</th>
                                            <th class="border-top-0">Level</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Nomor Telpon</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$no=1;
										foreach ($karyawan as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->username ?></td>
												<td><?= $value->nama_karyawan ?></td>
												<td><?= $value->level ?></td>
												<td><?= $value->alamat_karyawan ?></td>
												<td><?= $value->no_telp ?></td>
												<td>
												<div class="d-flex">
														<a href="<?= base_url('user/edit/'.$value->id_user) ?>" class="btn btn-warning" style="margin-right: 10px;">Edit</a>
														<a href="<?= base_url('user/delete/'.$value->id_user) ?>" onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-danger">Delete</a>
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
 