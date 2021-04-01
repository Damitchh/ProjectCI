<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
                <h5 class="card-header">Detail Data Buku</h5>
				<div class="card-body">
                    <h5 class="card-title"><?= $buku['judul']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $buku['kategori']?></h6>
					<p class="card-text mb-2">Penulis   : <?= $buku['penulis']?></p>
					<p class="card-text">Stock     : <?= $buku['stock']?></p>
					<a href="<?= base_url('cari')?>" class="btn btn-primary">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</div>