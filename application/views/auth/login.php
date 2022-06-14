<div class="container" style="width: 40%;margin-top:10%;"><!-- Pills navs -->
<div class="card p-4 alert-primary" style="border:2px solid ;border-radius: 10px;">
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
<li class="nav-item" role="presentation">
    <a class="nav-link active" href="<?= base_url('user/login')?>" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="false">Masuk</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link " href="<?= base_url('user/register')?>" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="true">Daftar</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form action="<?= base_url('user/login_post') ?>" method="post">
      <div class="text-center mb-3">
		  Silahkan Login
				<?php if ($this->session->flashdata('msg') !=null) { ?>
				<div class="alert alert-danger"><?= $this->session->flashdata('msg') ?></div>
			<?php } ?>
      </div>


      <!-- username input -->
      <div class="form-outline mb-4">
        <label class="form-label"  for="loginName">Username </label>
        <input type="username" id="loginName" name="username" class="form-control" required />
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="loginPassword">Password</label>
        <input type="password" id="loginPassword" name="password" class="form-control" required />
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Masuk</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Belum punya akun? <a href="#!">Daftar</a></p>
      </div>
    </form>
  </div>
  
</div>
</div>
<!-- Pills content -->
</div>
