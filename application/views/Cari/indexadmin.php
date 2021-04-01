<div class="container">
	<div class="flashdata">
		<?= $this->session->flashdata('message');?>
	</div>
	<div class="row">
		<div class="col-md-6 mt-3">
			<form action="" method="post">
				<div class="input-group mt-3 mb-3">
					<select class="form-control" id="kategori" name="kategori">
						<option>Semua</option>
						<?php foreach($kategori as $kg) : ?>
						<option value=<?= $kg['kategori']  ?>><?= $kg['kategori']  ?></option>
						<?php endforeach; ?>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="pencarian">Cari</button>
					</div>
				</div>
			</form>
			<a href="cari/tambah" class="btn btn-primary">Tambah Buku</a>

		</div>
	</div>

	<div class="card mt-3" style="width: 48rem;">
		<div class="card-header">
			KELOLA BUKU
		</div>
		<ul class="list-group list-group-horizontal">
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item"><?= $bk['judul']?>
					<button type="button" class="btn btn-outline-info btn-sm float-right ml-4" data-toggle="modal"
						data-target="#exampleModal">
						Edit
					</button>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Ganti Judul</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url();?>cari/editJudulBuku" method="post">
										<div class="form-group">
											<label for="judullama">Judul Lama</label>
											<input type="text" class="form-control" id="Judullama" name="judullama"
												required>
											<label for="judulbaru">Judul Baru</label>
											<input type="text" class="form-control" id="Judulbaru" name="judulbaru"
												required>
										</div>
										<button type="submit" class="btn btn-primary">Ganti!</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item"><?= $bk['stock']?>
					<button type="button" class="btn btn-outline-info btn-sm float-right ml-4" data-toggle="modal"
						data-target="#exampleModa2">
						Edit
					</button>
					<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Ganti Stock</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url();?>cari/editStockBuku" method="post">
										<div class="form-group">
											<label for="judullama">Judul Buku</label>
											<input type="text" class="form-control" id="Judulbuku" name="judulbuku"
												required>
											<label for="judulbaru">Stock</label>
											<input type="number" class="form-control" id="stockbaru" name="stockbaru"
												required>
										</div>
										<button type="submit" class="btn btn-primary">Ganti!</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item">
					<a href="<?= base_url();?>cari/hapusBuku/<?= $bk['id_buku']?>"
						class="btn btn-outline-danger btn-sm float-right mr-3"
						onclick="return confirm('Yakin?');">hapus</a>
					<a href="<?= base_url();?>cari/detailBuku/<?= $bk['id_buku']?>"
						class="btn btn-outline-primary btn-sm mr-2">Detail</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</ul>
	</div>
</div>
</div>
