						<div class="card" style="height: 80vh;">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="<?= base_url('user/update/'.$user->id_user) ?>" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Username" name="username"
											value="<?= $user->username ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" placeholder="Password" name="password"
											value="<?= $user->password ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Level</label>
                                        <div class="col-md-12 border-bottom p-0">
                                           <select name="level" id=""placeholder="Level"   class="form-control p-0 border-0">
											   <?php if ($user->level=='owner') { ?>
												<option value="owner">Owner</option>
												<option value="pegawai">Pegawai</option>
												<?php } elseif ($user->level=='pegawai') { ?>
												<option value="pegawai">Pegawai</option>
												<option value="owner">Owner</option>
												<?php }else{ ?>
													<option value="admin">Admin</option>
												<?php } ?>
										   </select> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama User</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Nama user" name="nama_karyawan"
											value="<?= $user->nama_karyawan ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Alamat</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Alamat" name="alamat_karyawan"
											value="<?= $user->alamat_karyawan ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nomor Telepon</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="nomor" name="no_telp" 
											value="<?= $user->no_telp ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
