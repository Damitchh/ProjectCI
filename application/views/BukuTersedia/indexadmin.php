<div class="container">
	<div class="card mt-3" style="width: 32rem;">
		<div class="card-header">
			<b style="color: #313235">LIST BUKU YANG TERSEDIA</b>
		</div>
		<ul class="list-group list-group-horizontal">
			<ul class="list-group">
				<?php foreach($buku as $bk) : ?>
				<li class="list-group-item"><?= $bk['judul']?>
				<b class="ml-5 float-right">Stock = <?= $bk['stock']?></b>
				</li>
				<?php endforeach; ?>
			</ul>
		</ul>
	</div>
</div>
</div>
