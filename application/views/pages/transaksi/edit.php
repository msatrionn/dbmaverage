<div class="card" style="height: 80vh;">
	<div class="card-body">
		<form class="form-horizontal form-material" action="<?= base_url('transaksi/update/'.$transaksi->id_transaksi) ?>" method="post">
		<div class="form-group mb-4">
		<label class="col-md-12 p-0">Nama Bahan</label>
		<div class="col-md-12 border-bottom p-0">
			<select placeholder="Nama Bahan" name="nama_bahan"
					class="form-control p-0 border-0" >
					<option value="<?= $transaksi->id_bahan ?>"><?= $transaksi->nama_bahan ?></option>
					<?php foreach ($bahan as $key => $value) { ?>
						<option value="<?= $value->id_bahan ?>"><?= $value->nama_bahan ?></option>
					<?php } ?>
			</select>	
	</div>
	</div>
	<div class="form-group mb-4">
		<label class="col-md-12 p-0">Jumlah</label>
		<div class="col-md-12 border-bottom p-0">
			<input type="text" placeholder="jumlah" name="jumlah"
				class="form-control p-0 border-0" required value="<?= $transaksi->jumlah ?>"> </div>
	</div>
	<div class="form-group mb-4">
		<label class="col-md-12 p-0">Total Harga</label>
		<div class="col-md-12 border-bottom p-0">
			<input type="number" placeholder="Total harga" name="total_harga" 
				class="form-control p-0 border-0" required value="<?= $transaksi->total_harga ?>"> </div>
	</div>
	<div class="form-group mb-4">
		<div class="col-sm-12">
			<button class="btn btn-success">Update</button>
		</div>
	</div>
		</form>
	</div>
</div>

