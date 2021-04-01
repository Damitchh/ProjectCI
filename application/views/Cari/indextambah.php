<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header text-center">
					TAMBAH DATA BUKU
				</div>
				<div class="card-body">

					<form action="inputdata" method="post">

						<div class="form-group">
							<label for="Judul">Judul</label>
							<input type="text" class="form-control" id="Judul" required name="judul">
						</div>
						<div class="form-group">
							<label for="penulis">Penulis</label>
							<input type="text" class="form-control" id="penulis" required name="penulis">
						</div>
						<div class="form-group">
							<label for="kategori">kategori</label>
							<select class="form-control" id="kategori" name="kategori" required>
								<?php foreach($buku as $bk) : ?>
								<option value=<?= $bk['kategori']  ?>><?= $bk['kategori']  ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="stock">Jumlah Stock</label>
							<input type="number" class="form-control" id="stock" required name="stock">
						</div>

						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>

					</form>
				</div>
			</div>



		</div>
	</div>
</div>