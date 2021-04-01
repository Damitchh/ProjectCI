<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Buku Yang Sedang Di Pinjam</h5>
                <?php foreach($peminjaman as $pj) : ?>
				<div class="card-body">
					<h5 class="card-title"><?= $pj['peminjaman_judul']?></h5>
					<h6 class="card-subtitle mb-2 text-muted">id Peminjaman : <?= $pj['id_peminjaman']?></h6>
					<h6 class="card-subtitle mb-2 text-muted">id Buku : <?= $pj['idbuku']?></h6>
					<p class="card-text mb-2">Peminjam : <?= $pj['nama_peminjam']?></p>
					<a href="<?= base_url()?>bukukamu/pengembalian/<?= $pj['idbuku']?> " class="btn btn-primary">Kembalikan Buku</a>
                </div>
                <?php endforeach ; ?>
			</div>
		</div>
	</div>
</div>