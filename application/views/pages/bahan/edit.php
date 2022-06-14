<div class="card" style="height: 80vh;">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="<?= base_url('bahan/update/'.$bahan->id_bahan) ?>" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Bahan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Nama Bahan" name="nama_bahan"
											value="<?= $bahan->nama_bahan ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Satuan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Satuan" name="satuan"
											value="<?= $bahan->satuan ?>"
                                                class="form-control p-0 border-0" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Harga</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" placeholder="Harga" name="harga" 
											value="<?= $bahan->harga_bahan ?>"
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
