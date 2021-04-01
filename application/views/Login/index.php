<div class="header-container">
	<div class="flashdata">
		<?= $this->session->flashdata('message');?>
	</div>
	<div class="isinya">
		<div class="elementnya">
			<div class="container">
				<div class="row mt-3">
					<div class="col-md-6">
						<form action="<?= base_url('login/index')?>" method="post">
							<div class="form-group">
								<b>LOGIN</b></br>
								<label for="exampleInputEmail1">Masukkan username</label>
								<input type="username" class="form-control" id="username" aria-describedby="emailHelp"
									name="username" value="<?=set_value('username')?>">
								<?= form_error('username','<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="Password" name="password">
								<?= form_error('password','<small class="text-danger">','</small>'); ?>
							</div>
							<div class="daftar">
								<a href="<?= base_url('login/registrasi')?>">Belum Punya Akun? Daftar!</a>
							</div>
							<button type="submit" class="btn btn-primary float-right">Login</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>