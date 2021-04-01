<div class="container">
	<div class="flashdata">
		<?= $this->session->flashdata('message');?>
	</div>

	<div class="row mt-4">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group">
					
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

		</div>
	</div>

	<div class="card mt-3" style="width: 38rem;">
		<div class="card-header">
			LIST BUKU
			
		</div>
		<ul class="list-group list-group-horizontal">
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item"><?= $bk['judul']?>

					<a href="<?= base_url();?>cari/detailBuku/<?= $bk['id_buku']?>"
						class="btn btn-outline-primary btn-sm float-right">Detail</a>
					<b class="mr-3 ml-3 float-right"><?= $bk['stock']?></b>

				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item">
					<?php
						if($bk['stock'] == 0) :?>
					<button class="btn btn-secondary btn-sm float-right" disabled>Pinjam</button>
					<?php else : ?>
					<a href="<?= base_url();?>bukutersedia/formpinjam/<?= $bk['id_buku']?>"
						class="btn btn-outline-success btn-sm float-right">Pinjam</a>
					<?php endif;?>
				</li>
				<?php endforeach; ?>
			</ul>
		</ul>
	</div>
</div>
</div>
