<div class="container">
	<div class="card mt-3" style="width: 40rem;">
		<div class="card-header">
			<b style="color: #313235">LIST BUKU YANG TERSEDIA</b>
		</div>
		<ul class="list-group list-group-horizontal">
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item"><?= $bk['judul']?>
				<?php if($bk['stock'] == 0) :?>
					<button class="btn btn-secondary btn-sm float-right" disabled>Pinjam</button>
					<b class="float-right ml-5">Stock = <?= $bk['stock']?></b>
					<?php else : ?>
						<a href="<?= base_url();?>bukutersedia/formpinjam/<?= $bk['id_buku']?>"
						class="btn btn-outline-success btn-sm ml-5 mr-3 float-right">Pinjam</a>
						<b class="float-right ml-5">Stock = <?= $bk['stock']?></b>
				<?php endif;?>
				</li>
				<?php endforeach; ?>
			</ul>
		</ul>
	</div>
</div>
</div>
