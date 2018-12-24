<form method="post" enctype="multipart/form-data">
	<h1>selamat datang silahkan tambah produk anda</h1>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button type="btn btn-primary" name="save">Simpan</button>
</form>
<?php

	if (isset($_POST['save'])) 
	{
		$gambar = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_produk/" . $gambar);

		$link->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) VALUES ('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$gambar', '$_POST[deskripsi]')");

		echo "<script>alert('Data telah tersimpan')</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

	}

?>



