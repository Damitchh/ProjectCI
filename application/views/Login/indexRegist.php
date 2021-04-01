<div class="header-container">
	<div class="isinya">
		<div class="elementnyaregist">
			<div class="container">
				<div class="row mt-3">
					<div class="col-md-6">
						<form action="<?= base_url('login/registrasi')?>" method="post">
							<div class="form-group">
								<b>REGISTRASI MEMBER</b>
								<label for="exampleInputEmail1">Masukkan username</label>
								<input type="username" class="form-control" id="username" name="username"
									aria-describedby="emailHelp" value="<?=set_value('username')?>">
								<?= form_error('username','<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">

								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" name="password1" id="password1">
								<?= form_error('password1','<small class="text-danger">','</small>'); ?>
								</br>
								<label for="exampleInputPassword1">Ulangi Password</label>
								<input type="password" class="form-control" name="password2" id="password2">
								<?= form_error('password2','<small class="text-danger">','</small>'); ?>

							</div>
							<div class="daftar">
							<a href="<?= base_url('login')?>">Sudah Punya Akun? Masuk!</a>
							</div>
							<button type="submit" class="btn btn-primary float-right">Daftar!</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>