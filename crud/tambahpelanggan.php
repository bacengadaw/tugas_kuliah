<form method="post" enctype="multipart/form-data">
	<h1>selamat datang silahkan tambah pelanggan anda</h1>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Email Pelanggan</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan</label>
		<input type="text" name="telepon" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<input type="text" name="alamat" class="form-control">
	</div>
	<button type="btn btn-primary" name="save">Simpan</button>
</form>
<?php

	if (isset($_POST['save'])) 
	{	

		$link->query("INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$_POST[nama]', '$_POST[email]', '$_POST[telepon]', '$_POST[alamat]')");

		echo "<script>alert('Data telah tersimpan')</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";

	}

?>



