<div class="container" style="width: 40%;margin-top:2%;"><!-- Pills navs -->
<div class="card p-4 alert-primary" style="border:2px solid ;border-radius: 10px;">
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" href="<?= base_url('user/login')?>" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="false">Masuk</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link active" href="<?= base_url('user/register')?>" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="true">Daftar</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="<?= base_url('user/register_post') ?>" method="post">
      <div class="text-center mb-3">
		  Silahkan Login
			<?php if ($this->session->flashdata('msg') !=null) { ?>
				<div class="alert alert-danger"><?= $this->session->flashdata('msg') ?></div>
			<?php }
			 ?>
			<?php if ($this->session->flashdata('msg_success') !=null) { ?>
				<div class="alert alert-success"><?= $this->session->flashdata('msg_success') ?></div>
			<?php }
			 ?>
      </div>


      <!-- user input -->
      <div class="form-outline mb-4">
		<label class="form-label" for="username">Username </label>
        <input type="text" id="username" name="username" class="form-control" required />
      </div>

	     <!-- Password input -->
	 <div class="form-outline mb-4">
		<label class="form-label" for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required />
      </div>

	   <!-- Nama input -->
	   <div class="form-outline mb-4">
		   <label class="form-label" for="name">Nama </label>
		   <input type="text" id="name" name="nama_karyawan" class="form-control" required />
      </div>

	   <!-- Alamat input -->
	   <div class="form-outline mb-4">
		   <label class="form-label" for="alamat">Alamat </label>
		   <input type="text" id="alamat" name="alamat_karyawan" class="form-control" required />
      </div>

	   <!-- No telp input -->
	   <div class="form-outline mb-4">
		   <label class="form-label" for="no_telp">No Telp </label>
		   <input type="text" id="no_telp" name="no_telp" class="form-control" required />
	</div>
	
	<!-- Level input -->
	<div class="form-outline mb-4">
		<label class="form-label" for="level">Level </label>
		<select name="level" id="level"  class="form-control" required aria-placeholder="level">
			<option value="owner">Owner</option>
			<option value="pegawai">Pegawai</option>
		</select>
      </div>



      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Sudah punya akun? <a href="#!">Masuk</a></p>
      </div>
    </form>
  </div>
  
</div>
</div>
<!-- Pills content -->
</div>
